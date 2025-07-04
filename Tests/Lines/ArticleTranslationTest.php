<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\Action;
use NumaxLab\Geslib\Lines\ArticleTranslation;
use PHPUnit\Framework\TestCase;

class ArticleTranslationTest extends TestCase
{
    public function testFromLineWithAllFields()
    {
        $line = [
            null, // Not used
            'N', // Action
            '12345', // articleId
            'ENG', // languageId
            'This is a description.', // description
            'This is an external description.' // externalDescription
        ];

        $articleTranslation = ArticleTranslation::fromLine($line);

        $this->assertInstanceOf(ArticleTranslation::class, $articleTranslation);
        $this->assertEquals(Action::fromCode('N'), $articleTranslation->action());
        $this->assertEquals(12345, $articleTranslation->articleId());
        $this->assertEquals('ENG', $articleTranslation->languageId());
        $this->assertEquals('This is a description.', $articleTranslation->description());
        $this->assertEquals('This is an external description.', $articleTranslation->externalDescription());
    }

    public function testFromLineWithNullableFieldsAsEmpty()
    {
        $line = [
            null,
            'N',
            '54321',
            'SPA',
            '', // description
            ''  // externalDescription
        ];

        $articleTranslation = ArticleTranslation::fromLine($line);

        $this->assertInstanceOf(ArticleTranslation::class, $articleTranslation);
        $this->assertEquals(54321, $articleTranslation->articleId());
        $this->assertEquals('SPA', $articleTranslation->languageId());
        $this->assertNull($articleTranslation->description());
        $this->assertNull($articleTranslation->externalDescription());
    }

    public function testFromLineWithNullableFieldsAsNullEquivalentInRawGeslib()
    {
        // Depending on how Geslib represents "null" for strings (could be empty, or a specific marker)
        // Assuming empty strings are the way to represent null for these fields.
        $line = [
            null,
            'M', // Action
            '98765', // articleId
            'FRA', // languageId
            null, // description (TypeCast::string(null) becomes null)
            null  // externalDescription (TypeCast::string(null) becomes null)
        ];

        $articleTranslation = ArticleTranslation::fromLine($line);

        $this->assertInstanceOf(ArticleTranslation::class, $articleTranslation);
        $this->assertEquals(Action::fromCode('M'), $articleTranslation->action());
        $this->assertEquals(98765, $articleTranslation->articleId());
        $this->assertEquals('FRA', $articleTranslation->languageId());
        $this->assertNull($articleTranslation->description());
        $this->assertNull($articleTranslation->externalDescription());
    }

    public function testCreateWithDeleteAction()
    {
        $articleTranslation = ArticleTranslation::createWithDeleteAction(11122, 'GER');

        $this->assertInstanceOf(ArticleTranslation::class, $articleTranslation);
        $this->assertEquals(Action::fromCode(Action::DELETE), $articleTranslation->action());
        $this->assertEquals(11122, $articleTranslation->articleId());
        $this->assertEquals('GER', $articleTranslation->languageId());
        $this->assertNull($articleTranslation->description());
        $this->assertNull($articleTranslation->externalDescription());
    }

    public function testFromLineWithDeleteAction()
    {
        // For delete, Geslib might only send key fields.
        // The implementation of ArticleTranslation::fromLine assumes articleId and languageId are present.
        $line = [
            null,
            'B', // Action (Delete)
            '33344', // articleId
            'ITA'  // languageId
            // Other fields might be missing or empty for a delete operation
        ];

        $articleTranslation = ArticleTranslation::fromLine($line);

        $this->assertInstanceOf(ArticleTranslation::class, $articleTranslation);
        $this->assertEquals(Action::fromCode(Action::DELETE), $articleTranslation->action());
        $this->assertEquals(33344, $articleTranslation->articleId());
        $this->assertEquals('ITA', $articleTranslation->languageId());
        $this->assertNull($articleTranslation->description());
        $this->assertNull($articleTranslation->externalDescription());
    }

    public function testCreateWithAction()
    {
        $action = Action::fromCode('N');
        $articleTranslation = ArticleTranslation::createWithAction(
            $action,
            777,
            'POR',
            'Portuguese Description',
            'Portuguese External Description'
        );

        $this->assertEquals($action, $articleTranslation->action());
        $this->assertEquals(777, $articleTranslation->articleId());
        $this->assertEquals('POR', $articleTranslation->languageId());
        $this->assertEquals('Portuguese Description', $articleTranslation->description());
        $this->assertEquals('Portuguese External Description', $articleTranslation->externalDescription());
    }

    public function testGetters()
    {
        $action = Action::fromCode('M');
        $articleId = 123;
        $languageId = 'JPN';
        $description = 'Japanese description';
        $externalDescription = 'External Japanese description';

        $articleTranslation = ArticleTranslation::createWithAction(
            $action,
            $articleId,
            $languageId,
            $description,
            $externalDescription
        );

        $this->assertEquals($action, $articleTranslation->action());
        $this->assertEquals($articleId, $articleTranslation->articleId());
        $this->assertEquals($languageId, $articleTranslation->languageId());
        $this->assertEquals($description, $articleTranslation->description());
        $this->assertEquals($externalDescription, $articleTranslation->externalDescription());
    }

    public function testGetCode()
    {
        $this->assertEquals('ATRA', ArticleTranslation::getCode());
    }
}
