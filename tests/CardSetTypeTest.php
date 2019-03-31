<?php

use App\CardSetParse;
use App\CardSetType;
use PHPUnit\Framework\TestCase;

class CardSetTypeTest extends TestCase
{
    public function flushData()
    {
        return [
            ['SA,S2,S3,S4,S5',true],
            ['SA,D4,S3,S4,S5',false],
        ];
    }
    /**
     * @dataProvider flushData
     */
    public function test_isFlush($cards,$except)
    {
        $cardSetType = $this->givenCardSetType($cards);

        $this->assertEquals($cardSetType->isFlush(),$except);
    }

    public function straightData()
    {
        return [
            ['S10,SJ,SQ,SK,SA' , true],
            ['SA,S2,S3,S4,S6' , false],
        ];
    }
    /**
     * @test
     * @dataProvider straightData
     */
    public function is_straight($cards,$except)
    {
        $cardSetType = $this->givenCardSetType($cards);

        $this->assertEquals($cardSetType->isStraight(),$except);

    }

    public function straightFlushData()
    {
        return [
            ['S2,S3,S4,S5,SA' , true],
            ['D2,D3,D4,D5,DA' , true],
            ['SA,S2,S3,S4,S6' , false],
        ];
    }

    /**
     * @test
     * @dataProvider straightFlushData
     */
    public function is_straight_flush($cards,$except)
    {
        $cardSetType = $this->givenCardSetType($cards);

        $this->assertEquals($cardSetType->isStraightFlush(),$except);
    }

    public function test_is_Four_of_a_Kind()
    {
        $cards = 'SA,DA,CA,HA,S2';
        $cardSetType = $this->givenCardSetType($cards);

        $this->assertTrue($cardSetType->isFourOfAKind());
    }

    public function test_is_not_Four_of_a_Kind()
    {
        $cards = 'SA,DA,CA,H4,S2';
        $cardSetType = $this->givenCardSetType($cards);

        $this->assertFalse($cardSetType->isFourOfAKind());
    }

    public function test_is_ThreeOfAKind()
    {
        $cards = 'SA,DA,CA,H4,S2';
        $cardSetType = $this->givenCardSetType($cards);

        $this->assertTrue($cardSetType->isThreeOfAKind());
    }

    public function test_isTwoPair()
    {
        $cards = 'SA,DA,C2,H2,S8';

        $cardSetType = $this->givenCardSetType($cards);

        $this->assertTrue($cardSetType->isTwoPair());
    }

    /**
     * @test
     * @group FullHouse
     */
    public function isFullHouse_return_true()
    {
        $cards = 'SA,DA,HA,H2,D2';

        $cardSetType = $this->givenCardSetType($cards);

        $this->assertTrue($cardSetType->isFullHouse());
    }

    /**
     * @test
     */
    public function isFullHouse_return_false()
    {
        $cards = 'SA,DA,C2,H2,S8';

        $cardSetType = $this->givenCardSetType($cards);

        $this->assertFalse($cardSetType->isFullHouse());
    }

    /**
     * @test
     */
    public function isPair_return_true()
    {
        $cards = 'SA,D3,H4,H2,D2';

        $cardSetType = $this->givenCardSetType($cards);

        $this->assertTrue($cardSetType->isOnePair());
    }

    /**
     * @test
     */
    public function isPair_return_false()
    {
        $cards = 'SA,D3,H3,H2,D2';

        $cardSetType = $this->givenCardSetType($cards);

        $this->assertFalse($cardSetType->isOnePair());
    }

    /**
     * @param string $cards
     * @return CardSetType
     * @throws Exception
     */
    public function givenCardSetType(string $cards)
    {
        $cardSetParse = new CardSetParse($cards);

        $cardSetType = new CardSetType();

        $cardSetType->setCardSet($cardSetParse->result());

        return $cardSetType;
    }

    public function rankData()
    {
        return [
            ['SA,S2,S3,S4,S5',32],
            ['SA,DA,HA,CA,S5',16],
            ['SA,DA,HA,D5,S5',5],
            ['SA,S3,S5,S7,S8',4],
            ['SA,DA,HA,D4,S5',3],
            ['SA,D2,H3,D4,S5',2],
            ['S2,D2,H3,D3,S5',1],
            ['S2,D2,H3,D4,S5',0],
        ];
    }

    /**
     * @test
     * @dataProvider rankData
     * @param $cards
     * @param $except
     */
    public function getRank($cards,$except)
    {


        $cardSetType = $this->givenCardSetType($cards);

        $rank = $cardSetType->getRank();

        $this->assertEquals($rank,$except);
    }
}
