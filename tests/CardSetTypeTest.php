<?php

use App\CardSetParse;
use App\CardSetType;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class CardSetTypeTest extends TestCase
{
    protected function tearDown()
    {
        m::close();
    }

    public function test_isFlush()
    {
        $cards        = 'SA,S2,S3,S4,S5';
        $cardSetType = $this->givenCardSetType($cards);

        $this->assertTrue($cardSetType->isFlush());
    }

    /**
     * @test
     */
    public function is_straight()
    {
        $cards        = 'S10,SJ,SQ,SK,SA';
        $cardSetType = $this->givenCardSetType($cards);

        $this->assertTrue($cardSetType->isStraight());
    }

    /**
     * @test
     */
    public function is_not_straight()
    {
        $cards        = 'SA,S2,S3,S4,S6';
        $cardSetType = $this->givenCardSetType($cards);

        $this->assertFalse($cardSetType->isStraight());
    }

    /**
     * @test
     */
    public function is_straight_flush()
    {
        $cards        = 'S2,S3,S4,S5,SA';
        $cardSetType = $this->givenCardSetType($cards);

        $this->assertTrue($cardSetType->isStraight() && $cardSetType->isFlush());
    }

    public function test_is_Four_of_a_Kind()
    {
        $cards        = 'SA,DA,CA,HA,S2';
        $cardSetType = $this->givenCardSetType($cards);

        $this->assertTrue($cardSetType->isFourOfAKind());
    }

    public function test_is_not_Four_of_a_Kind()
    {
        $cards        = 'SA,DA,CA,H4,S2';
        $cardSetType = $this->givenCardSetType($cards);

        $this->assertFalse($cardSetType->isFourOfAKind());
    }

    public function test_is_ThreeOfAKind()
    {
        $cards        = 'SA,DA,CA,H4,S2';
        $cardSetType = $this->givenCardSetType($cards);

        $this->assertTrue($cardSetType->isThreeOfAKind());
    }

    public function test_isTwoPair()
    {
        $cards        = 'SA,DA,C2,H2,S8';

        $cardSetType = $this->givenCardSetType($cards);

        $this->assertTrue($cardSetType->isTwoPair());
    }

    /**
     * @test
     * @group FullHouse
     */
    public function isFullHouse_return_true()
    {
        $cards        = 'SA,DA,HA,H2,D2';

        $cardSetType = $this->givenCardSetType($cards);

        $this->assertTrue($cardSetType->isFullHouse());
    }

    /**
     * @test
     */
    public function isFullHouse_return_false()
    {
        $cards        = 'SA,DA,C2,H2,S8';

        $cardSetType = $this->givenCardSetType($cards);

        $this->assertFalse($cardSetType->isFullHouse());
    }

    /**
     * @test
     */
    public function isPair_return_true()
    {
        $cards        = 'SA,D3,H4,H2,D2';

        $cardSetType = $this->givenCardSetType($cards);

        $this->assertTrue($cardSetType->isPair());
    }

    /**
     * @test
     */
    public function isPair_return_false()
    {
        $cards        = 'SA,D3,H3,H2,D2';

        $cardSetType = $this->givenCardSetType($cards);

        $this->assertFalse($cardSetType->isPair());
    }

    /**
     * @return CardSetType
     */
    public function givenCardSetType(string $cards)
    {
        $cardSetParse = new App\CardSetParse($cards);

        $cardSetType = new CardSetType();

        $cardSetType->setCardSet($cardSetParse->result());

        return $cardSetType;
    }
}
