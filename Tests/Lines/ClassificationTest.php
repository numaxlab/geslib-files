<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\Classification;
use PHPUnit\Framework\TestCase;

class ClassificationTest extends TestCase
{
    public function testFromLine()
    {
        $classification = Classification::fromLine([
            'CLASIF', 'A0', '1', 'DVD'
        ]);

        $this->assertEquals('A0', $classification->typeId());
        $this->assertEquals('1', $classification->id());
        $this->assertEquals('DVD', $classification->name());
    }
}
