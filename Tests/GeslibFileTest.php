<?php

namespace NumaxLab\Geslib\Tests;

use Mockery;
use NumaxLab\Geslib\GeslibFile;
use NumaxLab\Geslib\Lines\LineInterface;
use PHPUnit\Framework\TestCase;

class GeslibFileTest extends TestCase
{
    public function testAddsLines()
    {
        $geslibFile = new GeslibFile();

        $geslibFile->addLine(Mockery::mock(LineInterface::class));

        $this->assertIsArray($geslibFile->lines());
        $this->assertCount(1, $geslibFile->lines());
    }

    public function testParsesFile()
    {
        $fileContent = file_get_contents(__DIR__.'/fixtures/INITIAL');

        $geslibFile = GeslibFile::parse($fileContent);

        $this->assertInstanceOf(GeslibFile::class, $geslibFile);
    }

    public function testIsInitialFile()
    {
        $geslibFile = new GeslibFile();

        $this->assertIsBool(false, $geslibFile->isInitialFile());

        $geslibFile->setAsInitialFile();

        $this->assertIsBool(true, $geslibFile->isInitialFile());
    }
}
