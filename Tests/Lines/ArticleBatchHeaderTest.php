<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\Action;
use NumaxLab\Geslib\Lines\ArticleBatchHeader;
use PHPUnit\Framework\TestCase;

class ArticleBatchHeaderTest extends TestCase
{
    public function testFromLineWithCompleteData()
    {
        $line = [
            null, // Usually the full line string, not used by fromLine directly
            'A', // Action: New
            'BATCH001', // ID
            'Test Batch Description' // BatchDescription
        ];

        $articleBatchHeader = ArticleBatchHeader::fromLine($line);

        $this->assertInstanceOf(ArticleBatchHeader::class, $articleBatchHeader);
        $this->assertEquals(Action::ADD, $articleBatchHeader->action()->code());
        $this->assertEquals('BATCH001', $articleBatchHeader->id());
        $this->assertEquals('Test Batch Description', $articleBatchHeader->batchDescription());
    }

    public function testFromLineWithDeleteAction()
    {
        $line = [
            null,
            'B', // Action: Delete
            'BATCH002' // ID
        ];

        $articleBatchHeader = ArticleBatchHeader::fromLine($line);

        $this->assertInstanceOf(ArticleBatchHeader::class, $articleBatchHeader);
        $this->assertEquals(Action::DELETE, $articleBatchHeader->action()->code());
        $this->assertEquals('BATCH002', $articleBatchHeader->id());
        $this->assertNull($articleBatchHeader->batchDescription()); // Or handle as per actual delete logic
    }

    public function testFromLineWithMinimalData()
    {
        // Assuming batchDescription is optional
        $line = [
            null,
            'M', // Action: Modify
            'BATCH003' // ID
            // batchDescription is omitted
        ];

        $articleBatchHeader = ArticleBatchHeader::fromLine($line);

        $this->assertInstanceOf(ArticleBatchHeader::class, $articleBatchHeader);
        $this->assertEquals(Action::MODIFY, $articleBatchHeader->action()->code());
        $this->assertEquals('BATCH003', $articleBatchHeader->id());
        $this->assertNull($articleBatchHeader->batchDescription());
    }

    public function testGetCode()
    {
        $this->assertEquals('CLOTE', ArticleBatchHeader::getCode());
    }
}
