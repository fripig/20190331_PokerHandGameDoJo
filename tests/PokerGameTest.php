<?php

use App\PokerGame;
use PHPUnit\Framework\TestCase;

class PokerGameTest extends TestCase
{

    public function test_GamePlayerSetting()
    {
        $pokerGame = new PokerGame();
        $pokerGame->addPlayer("Duncan", "H2,H3,H4,H5,H6");
    }
}
