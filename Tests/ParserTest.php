<?php

namespace NumaxLab\Geslib\Tests;

use NumaxLab\Geslib\GeslibFile;
use NumaxLab\Geslib\Parser;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    public function testParsesFile()
    {
        $fileContent = file_get_contents(__DIR__.'/fixtures/INTER000');

        $parser = new Parser(new GeslibFile(), PHP_EOL);

        $geslibFile = $parser->parse($fileContent);

        $this->assertInstanceOf(GeslibFile::class, $geslibFile);
    }
}
