<?php

namespace NumaxLab\Geslib\Tests;

use NumaxLab\Geslib\Exceptions\InvalidLineCodeException;
use NumaxLab\Geslib\Exceptions\NotImplementedLineCodeException;
use NumaxLab\Geslib\LineFactory;
use NumaxLab\Geslib\Lines\Format;
use PHPUnit\Framework\TestCase;

class LineFactoryTest extends TestCase
{
    public function testCreatesFormatLine()
    {
        $formatLine = LineFactory::create('7', [
            '7',
            '01',
            'Tela'
        ]);

        $this->assertInstanceOf(Format::class, $formatLine);
    }

    public function testThrowsInvalidLineCodeException()
    {
        $this->expectException(InvalidLineCodeException::class);

        LineFactory::create('unexistent', []);
    }

    public function testThrowsNotImplementedLineCodeException()
    {
        $this->expectException(NotImplementedLineCodeException::class);

        LineFactory::create('PACK', []);
    }
}
