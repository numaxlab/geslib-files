<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\ArticleGpsr;
use PHPUnit\Framework\TestCase;

class ArticleGpsrTest extends TestCase
{
    public function testFromLineWithAllValuesPresent()
    {
        $lineData = [
            ArticleGpsr::CODE,
            67890,
            10,
            'Unknown Value 2',
            'Unknown Value 3',
            'http://example.com/article/67890',
        ];
        $articleGpsr = ArticleGpsr::fromLine($lineData);

        $this->assertEquals(67890, $articleGpsr->articleId());
        $this->assertEquals(10, $articleGpsr->unknown1());
        $this->assertEquals('Unknown Value 2', $articleGpsr->unknown2());
        $this->assertEquals('Unknown Value 3', $articleGpsr->unknown3());
        $this->assertEquals('http://example.com/article/67890', $articleGpsr->url());
    }
}
