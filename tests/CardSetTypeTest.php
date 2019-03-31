<?php

use App\CardSetType;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class CardSetTypeTest extends TestCase
{
    protected function tearDown()
    {
        m::close();
    }

    public function test_is同花()
    {
        $cardSetParse = new App\CardSetParse('SA,S2,S3,S4,S5');

        $cardSetType = new CardSetType();

        $cardSetType->setCardSet($cardSetParse->result());

        $this->assertTrue($cardSetType->is同花());
    }

}
