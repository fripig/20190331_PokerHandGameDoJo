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
        if(count($cardsNumber) < 5) return false;

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

    public function isStraightFlush()
    {
        return $this->isStraight() && $this->isFlush();
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
        $result = $this->getCardsNumberGroup();

        $pair_count_key = 2;
        return ($result[$pair_count_key] ?? 0) === 2;
    }

    public function isFullHouse()
    {
        $result = $this->getCardsNumberGroup();

        $three_kind_key = 3;
        $pair_count_key = 2;

        $has_three_kind = ($result[$three_kind_key] ?? 0) == 1;
        $has_one_pair = ($result[$pair_count_key] ?? 0) == 1;

        return $has_three_kind && $has_one_pair;
    }

    public function isOnePair()
    {
        $result = $this->getCardsNumberGroup();

        return ($result[2] ?? 0) === 1;
    }

    public function cardTypeResult()
    {
        if ($this->isFlush() && $this->isStraight()) {
            return "Straight Flush";
        }
    }

    /**
     * @return array
     */
    protected function getCardsNumberGroup(): array
    {
        $cardsNumber = $this->extractNumber();

        $result = array_count_values($cardsNumber);

        $result = array_count_values($result);
        return $result;
    }

    public function getRank()
    {
        if($this->isStraightFlush()) return 32;
        if($this->isFourOfAKind()) return 16;
        if($this->isFullHouse()) return 5;
        if($this->isFlush()) return 4;
        if($this->isThreeOfAKind()) return 3;
        if($this->isStraight()) return 2;
        if($this->isTwoPair()) return 1;
        if($this->isOnePair()) return 0;

        return -1;
    }

    public function compare(CardSetType $target)
    {
        return $this->getRank() <=> $target->getRank();
    }
}
