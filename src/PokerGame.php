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
        $type1 = $this->givenCardType($firstCardSet);
        $type2 = $this->givenCardType($secondCardSet);

        if ($type1->cardTypeResult() == $type2->cardTypeResult()) {
            return "Draw, {$type1->cardTypeResult()}";
        }

        return "Draw, Straight Flush";
    }

    /**
     * @param string $cards
     * @return CardSetType
     */
    protected function givenCardType(string $cards): CardSetType
    {
        $cardSetType = new CardSetType();
        $cardSetType->setCardSet((new CardSetParse($cards))->result());
        return $cardSetType;
    }
}
