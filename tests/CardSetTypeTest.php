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

        $this->assertTrue($cardSetType->is_Flush());
    }

    /**
     * @test
     */
    public function is_straight()
    {
        $cards        = 'S10,SJ,SQ,SK,SA';
        $cardSetType = $this->givenCardSetType($cards);

        $this->assertTrue($cardSetType->is_straight());
    }

    /**
     * @test
     */
    public function is_not_straight()
    {
        $cards        = 'SA,S2,S3,S4,S6';
        $cardSetType = $this->givenCardSetType($cards);

        $this->assertFalse($cardSetType->is_straight());
    }

    /**
     * @test
     */
    public function is_straight_flush()
    {
        $cards        = 'S2,S3,S4,S5,SA';
        $cardSetType = $this->givenCardSetType($cards);

        $this->assertTrue($cardSetType->is_straight() && $cardSetType->is_Flush());
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
