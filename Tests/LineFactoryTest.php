<?php

namespace NumaxLab\Geslib\Tests;

use NumaxLab\Geslib\Exceptions\InvalidLineCodeException;
use NumaxLab\Geslib\Exceptions\NotImplementedLineCodeException;
use NumaxLab\Geslib\LineFactory;
use NumaxLab\Geslib\Lines\ArtAdv;
use NumaxLab\Geslib\Lines\BindingType;
use PHPUnit\Framework\TestCase;

class LineFactoryTest extends TestCase
{
    public function testCreatesFormatLine()
    {
        $formatLine = LineFactory::create('7', [
            '7',
            '01',
            'Tela',
        ]);

        $this->assertInstanceOf(BindingType::class, $formatLine);
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

    public function testCreatesArtAdvLine()
    {
        $artAdvLine = LineFactory::create(ArtAdv::CODE, [
            ArtAdv::CODE,
            'A',
            '123',
            '456',
            'Test Description',
        ]);

        $this->assertInstanceOf(ArtAdv::class, $artAdvLine);
    }
}
