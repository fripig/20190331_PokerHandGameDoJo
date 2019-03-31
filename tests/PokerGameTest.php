<?php

use App\Card;
use App\CardParse;
use App\PokerGame;
use PHPUnit\Framework\TestCase;

class PokerGameTest extends TestCase
{

    public function test_GamePlayerSetting()
    {
        $pokerGame = $this->setGameInit();

        $result = $pokerGame->getResult();
        $this->assertEquals("Draw, Straight Flush", $result);
    }

    public function testCardProvider()
    {
        return [
            ['H3',3,3],
            ['S4',4,4],
            ['D5',2,5],
            ['C6',1,6],
        ];
    }
    /**
     * @dataProvider testCardProvider
     */
    public function test_parseSingleCard($text,$exceptColor,$exceptNumber)
    {
        $card  = new Card($text);

        $this->assertEquals($card->getColor(),$exceptColor);
        $this->assertEquals($card->getNumber(),$exceptNumber);


    }
    public function test_ParseCard()
    {
        $card = "H2,H3,H4,H5,H6";

        $cardParse = new CardParse($card);


    }

    /**
     * @return PokerGame
     */
    public function setGameInit(): PokerGame
    {
        $pokerGame = new PokerGame();
        $pokerGame->addFirstPlayerSet("Duncan", "H2,H3,H4,H5,H6");
        $pokerGame->addSecondPlayerSet("Mouson", "H2,H3,H4,H5,H6");
        return $pokerGame;
    }
}
