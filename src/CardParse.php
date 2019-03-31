<?php
/**
 * Created by PhpStorm.
 * User: fripig
 * Date: 2019-03-31
 * Time: 11:59
 */

namespace App;

use App\Card;

class CardParse
{
    /**
     * @var string
     */
    private $card;
    private $result;

    /**
     * CardParse constructor.
     * @param string $card
     */
    public function __construct(string $card)
    {
        $this->card = $card;
    }

    private function parse()
    {
        $result = explode(',',$this->card);
        $this->result = array_map(function($item){
            return new Card($item);
        },$result);

    }

    public function result()
    {
        return $this->result;
    }
}