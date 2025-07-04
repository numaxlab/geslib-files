<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\ArticleTranslation;
use PHPUnit\Framework\TestCase;

class ArticleTranslationTest extends TestCase
{
    public function testFromLineWithAllFields()
    {
        $line = [
            ArticleTranslation::CODE,
            12345,
            '007',
            'This is a description.',
            'This is an external description.',
        ];

        $articleTranslation = ArticleTranslation::fromLine($line);

        $this->assertInstanceOf(ArticleTranslation::class, $articleTranslation);
        $this->assertEquals(12345, $articleTranslation->articleId());
        $this->assertEquals('007', $articleTranslation->languageId());
        $this->assertEquals('This is a description.', $articleTranslation->description());
        $this->assertEquals('This is an external description.', $articleTranslation->externalDescription());
    }

    public function testGetCode()
    {
        $this->assertEquals('ATRA', ArticleTranslation::getCode());
    }
}
