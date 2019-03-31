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

}
