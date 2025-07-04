<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\ArticleBatchLine;
use PHPUnit\Framework\TestCase;

class ArticleBatchLineTest extends TestCase
{
    public function testFromLineWithCompleteData()
    {
        $line = [
            ArticleBatchLine::CODE,
            '01',
            123,
            'Reference',
            10,
        ];

        $articleBatchLine = ArticleBatchLine::fromLine($line);

        $this->assertInstanceOf(ArticleBatchLine::class, $articleBatchLine);
        $this->assertEquals('01', $articleBatchLine->batchId());
        $this->assertEquals(123, $articleBatchLine->articleId());
        $this->assertEquals('Reference', $articleBatchLine->reference());
        $this->assertEquals(10, $articleBatchLine->quantity());
    }

    public function testGetCode()
    {
        $this->assertEquals('LLOTE', ArticleBatchLine::getCode());
    }
}
