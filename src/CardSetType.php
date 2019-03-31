<?php

namespace App;



use Exception;

class CardSetType
{
    /**
     * @var array
     */
    private $cardSet;

    public function setCardSet(array $cardSet)
    {

        if(count($cardSet) != 5){
            throw new Exception('cardSet must 5');
        }
        $this->cardSet = $cardSet;
    }

    public function isFlush()
    {
        return count(array_unique(array_map(function (Card $card) {
                return $card->getColor();
            }, $this->cardSet))) == 1;
    }

    public function isStraight()
    {
        $cardsNumber = array_unique($this->extractNumber());

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

    public function isFourOfAKind()
    {
        return $this->givenSameOfAKind(4);
    }

    public function isThreeOfAKind()
    {
        return $this->givenSameOfAKind(3);
    }

    /**
     * @return array
     */
    public function extractNumber(): array
    {
        $cardsNumber = array_map(function (Card $card) {
            return $card->getNumber();
        }, $this->cardSet);
        return $cardsNumber;
    }

    /**
     * @param $number
     *
     * @return bool
     */
    protected function givenSameOfAKind($number): bool
    {
        $cardsNumber = $this->extractNumber();
        $result = array_count_values($cardsNumber);

        return max(array_values($result)) == $number;
    }

    public function isTwoPair()
    {
        $cardsNumber = $this->extractNumber();

        $result = array_count_values($cardsNumber);

        $result = array_count_values($result);

        $pair_count_key = 2;
        return ($result[$pair_count_key] ?? 0) === 2;
    }

    public function isFullHouse()
    {
        return !$this->isTwoPair() && $this->isPair() && $this->isThreeOfAKind();
    }

    public function isPair()
    {
        $cardsNumber = $this->extractNumber();

        $result = array_count_values($cardsNumber);

        $result = array_count_values($result);

        return ($result[2] ?? 0) === 1;
    }

    public function cardTypeResult()
    {
        if ($this->isFlush() && $this->isStraight()) {
            return "Straight Flush";
        }
    }
}
