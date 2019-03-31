<?php

namespace App;

use Mockery as m;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{

    protected function tearDown()
    {
        m::close();
    }
    public function cardProvider()
    {
        return [
            ['H3',3,3],
            ['S4',4,4],
            ['D5',2,5],
            ['C6',1,6],
        ];
    }

    /**
     * @dataProvider cardProvider
     */
    public function test_parseSingleCard($text,$exceptColor,$exceptNumber)
    {
        $card  = new Card($text);

        $this->assertEquals($card->getColor(),$exceptColor);
        $this->assertEquals($card->getNumber(),$exceptNumber);


    }
}
