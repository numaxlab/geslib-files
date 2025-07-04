<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\ArticleBatchHeader;
use PHPUnit\Framework\TestCase;

class ArticleBatchHeaderTest extends TestCase
{
    public function testFromLineWithCompleteData()
    {
        $line = [
            ArticleBatchHeader::CODE,
            '01',
            'Nombre',
            'Centro',
            'Nemotécnico',
            'Info web',
            'Nombre categoría',
            'Tipo',
        ];

        $articleBatchHeader = ArticleBatchHeader::fromLine($line);

        $this->assertInstanceOf(ArticleBatchHeader::class, $articleBatchHeader);
        $this->assertEquals('01', $articleBatchHeader->id());
        $this->assertEquals('Nombre', $articleBatchHeader->name());
    }

    public function testGetCode()
    {
        $this->assertEquals('CLOTE', ArticleBatchHeader::getCode());
    }
}
