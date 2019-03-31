<?php

namespace App;

use Mockery as m;
use PHPUnit\Framework\TestCase;

class CardSetParseTest extends TestCase
{

    protected function tearDown()
    {
        m::close();
    }

    public function testResult()
    {
        $cardSetParse = new CardSetParse("s2, s3, s4, s5, s6");
        $result = $cardSetParse->result();

        $this->assertIsArray($result);
        $this->assertCount(5, $result);
        $this->assertInstanceOf(\App\Card::class, $result[0]);
        $this->assertInstanceOf(\App\Card::class, $result[1]);
        $this->assertInstanceOf(\App\Card::class, $result[2]);
        $this->assertInstanceOf(\App\Card::class, $result[3]);
        $this->assertInstanceOf(\App\Card::class, $result[4]);
    }

}
