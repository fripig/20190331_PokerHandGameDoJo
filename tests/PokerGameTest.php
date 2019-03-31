<?php

use App\Card;
use App\CardSetParse;
use App\PokerGame;
use PHPUnit\Framework\TestCase;

class PokerGameTest extends TestCase
{

    public function test_GamePlayerSetting()
    {
        $pokerGame = new PokerGame('Duncan', 'Mouson');
        $result = $pokerGame->play( "H2,H3,H4,H5,H6","H2,H3,H4,H5,H6");

        $this->assertEquals("Draw, Straight Flush", $result);
    }

}
