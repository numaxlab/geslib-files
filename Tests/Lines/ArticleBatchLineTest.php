<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\Action;
use NumaxLab\Geslib\Lines\ArticleBatchLine;
use PHPUnit\Framework\TestCase;

class ArticleBatchLineTest extends TestCase
{
    public function testFromLineWithCompleteData()
    {
        $line = [
            null, // Full line string, not used directly
            'A', // Action: New
            'LINE001', // ID
            'ARTICLE123', // ArticleId
            '10' // Quantity
        ];

        $articleBatchLine = ArticleBatchLine::fromLine($line);

        $this->assertInstanceOf(ArticleBatchLine::class, $articleBatchLine);
        $this->assertEquals(Action::ADD, $articleBatchLine->action()->code());
        $this->assertEquals('LINE001', $articleBatchLine->id());
        $this->assertEquals('ARTICLE123', $articleBatchLine->articleId());
        $this->assertEquals(10, $articleBatchLine->quantity());
    }

    public function testFromLineWithDeleteAction()
    {
        $line = [
            null,
            'B', // Action: Delete
            'LINE002' // ID
        ];

        $articleBatchLine = ArticleBatchLine::fromLine($line);

        $this->assertInstanceOf(ArticleBatchLine::class, $articleBatchLine);
        $this->assertEquals(Action::DELETE, $articleBatchLine->action()->code());
        $this->assertEquals('LINE002', $articleBatchLine->id());
        $this->assertNull($articleBatchLine->articleId());
        $this->assertNull($articleBatchLine->quantity());
    }

    public function testFromLineWithMinimalDataForModify()
    {
        // Assuming articleId and quantity are optional for modify,
        // or perhaps only quantity is being modified.
        $line = [
            null,
            'M', // Action: Modify
            'LINE003', // ID
            'ARTICLEXYZ' // ArticleId
            // Quantity is omitted, expecting null or default
        ];

        $articleBatchLine = ArticleBatchLine::fromLine($line);

        $this->assertInstanceOf(ArticleBatchLine::class, $articleBatchLine);
        $this->assertEquals(Action::MODIFY, $articleBatchLine->action()->code());
        $this->assertEquals('LINE003', $articleBatchLine->id());
        $this->assertEquals('ARTICLEXYZ', $articleBatchLine->articleId());
        $this->assertNull($articleBatchLine->quantity());
    }

    public function testGetCode()
    {
        $this->assertEquals('LLOTE', ArticleBatchLine::getCode());
    }
}
