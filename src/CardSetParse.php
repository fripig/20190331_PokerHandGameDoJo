<?php

namespace App;

class CardSetParse
{
    /**
     * @var string
     */
    private $cards;
    private $result;

    /**
     * CardParse constructor.
     * @param string $cards
     */
    public function __construct(string $cards)
    {
        $this->cards = $cards;
        $this->parse();
    }

    private function parse()
    {
        $result = explode(',',$this->cards);
        $this->result = array_map(function($item){
            return new Card($item);
        },$result);

    }

    public function result()
    {
        return $this->result;
    }
}
