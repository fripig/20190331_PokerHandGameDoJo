<?php

namespace App;

class Card
{
    const SHAPE             = 4;
    const HEART             = 3;
    const DIMAND            = 2;
    const CLUB              = 1;

    const CARD_ACE          = 1;
    const CARD_HIGH_ACE     = 14;
    const CARD_JACK         = 11;
    const CARD_QUEEN        = 12;
    const CARD_KING         = 13;


    private $color;
    private $number;

    public function __construct(string $text)
    {
        $this->color = $this->parseColor($text);

        $this->number = $this->parseWeight($text);
    }

    private function parseColor(string $text)
    {
        $map = [
            'S' => self::SHAPE,
            'H' => self::HEART,
            'D' => self::DIMAND,
            'C' => self::CLUB
        ];
        $text = strtoupper(trim($text));
        return $map[$text[0]] ?? -1;
    }

    private function parseWeight(string $text)
    {
        $map = [
            'A' => self::CARD_ACE,
            'J' => self::CARD_JACK,
            'Q' => self::CARD_QUEEN,
            'K' => self::CARD_KING,
        ];

        $text = strtoupper(trim($text));
        return $map[$text[1]] ?? intval(substr($text, 1));
    }

    /**
     * @return int|mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return int|mixed
     */
    public function getColor()
    {
        return $this->color;
    }
}
