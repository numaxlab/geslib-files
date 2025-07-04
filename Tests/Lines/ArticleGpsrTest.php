<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\ArticleGpsr;
use PHPUnit\Framework\TestCase;

class ArticleGpsrTest extends TestCase
{
    public function testFromLineWithAllValuesPresent()
    {
        $lineData = [
            ArticleGpsr::CODE, // Index 0: Line code
            '67890',           // Index 1: articleId
            '10',              // Index 2: unknown1
            'Unknown Value 2', // Index 3: unknown2
            'Unknown Value 3', // Index 4: unknown3
            'http://example.com/article/67890' // Index 5: url
        ];
        $articleGpsr = ArticleGpsr::fromLine($lineData);

        $this->assertEquals('67890', $articleGpsr->articleId());
        $this->assertEquals(10, $articleGpsr->unknown1());
        $this->assertEquals('Unknown Value 2', $articleGpsr->unknown2());
        $this->assertEquals('Unknown Value 3', $articleGpsr->unknown3());
        $this->assertEquals('http://example.com/article/67890', $articleGpsr->url());
    }

    public function testFromLineWithNullAndEmptyValues()
    {
        $lineData = [
            ArticleGpsr::CODE,
            '11223', // articleId
            null,    // unknown1
            null,    // unknown2
            null,    // unknown3
            null     // url
        ];
        $articleGpsr = ArticleGpsr::fromLine($lineData);

        $this->assertEquals('11223', $articleGpsr->articleId());
        $this->assertNull($articleGpsr->unknown1());
        $this->assertNull($articleGpsr->unknown2());
        $this->assertNull($articleGpsr->unknown3());
        $this->assertNull($articleGpsr->url());

        $lineDataWithEmptyStrings = [
            ArticleGpsr::CODE,
            '11224', // articleId
            '',      // unknown1 (should be cast to null for integer)
            '',      // unknown2 (should be cast to null by TypeCast::string)
            '',      // unknown3 (should be cast to null by TypeCast::string)
            ''       // url (should be cast to null by TypeCast::string)
        ];
        $articleGpsrEmptyStrings = ArticleGpsr::fromLine($lineDataWithEmptyStrings);

        $this->assertEquals('11224', $articleGpsrEmptyStrings->articleId());
        $this->assertNull($articleGpsrEmptyStrings->unknown1());
        $this->assertNull($articleGpsrEmptyStrings->unknown2());
        $this->assertNull($articleGpsrEmptyStrings->unknown3());
        $this->assertNull($articleGpsrEmptyStrings->url());
    }

    public function testMinimalLineData()
    {
        // Test with only the required articleId and the line code itself.
        // Other fields should default to null.
        // According to fromLine, it expects 5 data fields after the code.
        // If fewer are provided, PHP will raise warnings for undefined array keys.
        // TypeCast should handle empty strings or nulls gracefully.
        $lineData = [
            ArticleGpsr::CODE,
            '54321', // articleId
            '',      // unknown1
            '',      // unknown2
            '',      // unknown3
            ''       // url
        ];
        $articleGpsr = ArticleGpsr::fromLine($lineData);

        $this->assertEquals('54321', $articleGpsr->articleId());
        $this->assertNull($articleGpsr->unknown1());
        $this->assertNull($articleGpsr->unknown2());
        $this->assertNull($articleGpsr->unknown3());
        $this->assertNull($articleGpsr->url());
    }
}
