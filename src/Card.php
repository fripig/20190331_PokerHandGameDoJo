<?php

namespace App;

class Card
{
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
            'S' => 4,
            'H' => 3,
            'D' => 2,
            'C' => 1
        ];
        return $map[$text[0]] ?? -1;
    }

    private function parseWeight(string $text)
    {
        $map = [
            'A' => 1,
            'J' => 11,
            'Q' => 12,
            'K' => 13,
        ];

        return $map[$text[1]] ?? intval(substr($text,1));
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