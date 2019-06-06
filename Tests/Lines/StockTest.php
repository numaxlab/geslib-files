<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\Stock;
use PHPUnit\Framework\TestCase;

class StockTest extends TestCase
{
    public function testFromLinePositiveValue()
    {
        $stock = Stock::fromLine([
            'B', '13', '5'
        ]);

        $this->assertEquals('13', $stock->articleId());
        $this->assertEquals(5, $stock->quantity());
    }

    public function testFromLineNegativeValue()
    {
        $stock = Stock::fromLine([
            'B', '3002', '-1'
        ]);

        $this->assertEquals('3002', $stock->articleId());
        $this->assertEquals(-1, $stock->quantity());
    }
}
