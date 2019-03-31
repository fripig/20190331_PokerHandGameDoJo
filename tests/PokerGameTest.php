<?php

use App\Card;
use App\CardSetParse;
use App\PokerGame;
use PHPUnit\Framework\TestCase;

class PokerGameTest extends TestCase
{

    /** @var PokerGame */
    private $pokerGame;

    protected function setUp()
    {
        $this->pokerGame = new PokerGame('Duncan', 'Mouson');
    }

    public function test_GamePlayerSetting()
    {
        $result = $this->pokerGame->play("H2,H3,H4,H5,H6","H2,H3,H4,H5,H6");

        $this->assertEquals("Draw, Straight Flush", $result);
    }
}
