<?php

use App\Card;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    public function cardProvider()
    {
        return [
            ['H3', 3, 3],
            ['S4', 4, 4],
            ['D5', 2, 5],
            ['C6', 1, 6],
            ['CK', 1, 13],
            ['CQ', 1, 12],
            ['CJ', 1, 11],
            ['CA', 1, 1],
            ['C10', 1, 10],
            ['c10', 1, 10],
        ];
    }

    /**
     * @dataProvider cardProvider
     */
    public function test_parseSingleCard($text, $exceptColor, $exceptNumber)
    {
        $card = new Card($text);

        $this->assertEquals($card->getColor(), $exceptColor);
        $this->assertEquals($card->getNumber(), $exceptNumber);
    }
}
