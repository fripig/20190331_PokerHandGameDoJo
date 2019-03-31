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


    //public function test_ParseCard()
    //{
    //    $card = "H2,H3,H4,H5,H6";
    //
    //    $cardParse = new CardParse($card);
    //
    //
    //}

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
