<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\Warning;
use PHPUnit\Framework\TestCase;

class WarningTest extends TestCase
{
    public function testFromLine()
    {
        $line = [
            Warning::CODE,
            '01',
            1,
            'Sample Description',
        ];

        $warning = Warning::fromLine($line);

        $this->assertEquals(Warning::CODE, $warning->getCode());
        $this->assertEquals('01', $warning->id());
        $this->assertEquals(1, $warning->sort());
        $this->assertEquals('Sample Description', $warning->description());
    }

    public function testGetCode()
    {
        $this->assertEquals('ARTADV', Warning::getCode());
    }
}
