<?php

namespace App;


class PokerGame
{
    private $firstPlayer;
    private $secondPlayer;

    /**
     * PokerGame constructor.
     *
     * @param $firstPlayer
     * @param $secondPlayer
     */
    public function __construct($firstPlayer, $secondPlayer)
    {
        $this->firstPlayer = $firstPlayer;
        $this->secondPlayer = $secondPlayer;
    }

    public function play(string $firstCardSet, string $secondCardSet)
    {
        return "Draw, Straight Flush";

    }

}
