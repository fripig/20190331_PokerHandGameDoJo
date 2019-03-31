<?php
/**
 * Created by PhpStorm.
 * User: fripig
 * Date: 2019-03-31
 * Time: 11:59
 */

namespace App;

use App\Card;

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
