<?php

use App\PokerGame;
use PHPUnit\Framework\TestCase;

class PokerGameTest extends TestCase
{

    public function test_GamePlayerSetting()
    {
        $pokerGame = new PokerGame();
        $pokerGame->addFirstPlayerSet("Duncan", "H2,H3,H4,H5,H6");
        $pokerGame->addSecondPlayerSet("Mouson", "H2,H3,H4,H5,H6");

        $result = $pokerGame->getResult();
        $this->assertEquals("Draw, Straight Flush", $result);
    }
}
