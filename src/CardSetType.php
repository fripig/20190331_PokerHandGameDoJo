<?php


namespace App;


use test\Mockery\ArgumentObjectTypeHint;

class CardSetType
{
    /**
     * @var array
     */
    private $cardSet;

    public function setCardSet(array $cardSet)
    {
        $this->cardSet = $cardSet;
    }

    public function is_Flush()
    {
        return count(array_unique(array_map(function (Card $card) {
                return $card->getColor();
            }, $this->cardSet))) == 1;
    }

    public function is_straight()
    {
        $cardsNumber = array_map(function (Card $card) {
            return $card->getNumber();
        }, $this->cardSet);

        if (max($cardsNumber) === 13) {
            foreach ($cardsNumber as $key => $card) {
                if ($card === 1) {
                    $cardsNumber[$key] = 14;
                    break;
                }
            }
        }

        return max($cardsNumber) - min($cardsNumber) === 4;
    }
}
