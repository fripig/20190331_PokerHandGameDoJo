<?php

namespace App;

use App\CardSetType;
use App\CardSetParse;

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
        $type1 = new CardSetType();
        $type1->setCardSet((new CardSetParse($firstCardSet))->result());

        $type2 = new CardSetType();
        $type2->setCardSet((new CardSetParse($secondCardSet))->result());

        if ($type1->cardTypeResult() == $type2->cardTypeResult()) {
            return "Draw, {$type1->cardTypeResult()}";
        }

        return "Draw, Straight Flush";
    }

}
