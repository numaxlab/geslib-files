<?php

namespace NumaxLab\Geslib\Tests\Lines;

use Carbon\Carbon;
use NumaxLab\Geslib\Lines\Article;
use NumaxLab\Geslib\Lines\Edition;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    public function testFromLineWithDeleteAction()
    {
        $article = Article::fromLine([
            'GP4', 'B', '1'
        ]);

        $this->assertInstanceOf(Article::class, $article);
        $this->assertEquals(true, $article->action()->isDelete());
        $this->assertEquals('1', $article->id());
    }

    public function testFromLineWithAddAction()
    {
        $article = Article::fromLine([
            'GP4', 'A', '1', 'Una historia social del vino ', 'Mees, Ludger; Nagel, Klaus-Jürgen; Puhle, Hans-Jürgen', '4659', '978-84-309-7678-2', '9788430976782', '512', '01', 'EDITORIAL TECNOS', '20190601', '20190701', '    ', '2019', '', '', '0', '20190530', '', '001', '03', '', '', '1', '', 'Rioja, Navarra, Cataluña 1860-1940', '0', '6,00', '28,00', 'L0', '1', '220', '26,92', '', '868', '170', '240', '', '', '', '', '4,00', '', '', '0,00', '', '', '', '', 'N', 'N', '', '', '', '', '', '', 'N'
        ]);

        $this->assertInstanceOf(Article::class, $article);
        $this->assertEquals(true, $article->action()->isAdd());
        $this->assertEquals('Una historia social del vino', $article->title());
        $this->assertCount(3, $article->authors());
        $this->assertEquals('978-84-309-7678-2', $article->isbn());
        $this->assertEquals('9788430976782', $article->ean());
        $this->assertIsInt($article->pagesQty());
        $this->assertEquals(512, $article->pagesQty());
        $this->assertInstanceOf(Edition::class, $article->edition());
        $this->assertInstanceOf(Carbon::class, $article->edition()->date());
        $this->assertInstanceOf(Carbon::class, $article->edition()->reEditionDate());
        $this->assertNull($article->firstEditionYear());
        $this->assertEquals(2019, $article->lastEditionYear());
        $this->assertNull($article->location());
        $this->assertNull($article->stock());
        $this->assertEquals('0', $article->topicId());
        $this->assertInstanceOf(Carbon::class, $article->createdAt());
        $this->assertNull($article->noveltyDate());
        $this->assertEquals('001', $article->languageId());
        $this->assertEquals('03', $article->formatId());
        $this->assertNull($article->translator());
        $this->assertNull($article->illustrator());
        $this->assertEquals('1', $article->collectionId());
        $this->assertNull($article->collectionNumber());
        $this->assertEquals('Rioja, Navarra, Cataluña 1860-1940', $article->subtitle());
        $this->assertEquals('0', $article->statusId());
        $this->assertEquals(600, $article->tmr());
        $this->assertEquals(2800, $article->retailPrice());
        $this->assertEquals('L0', $article->typeId());
        $this->assertEquals('1', $article->classificationId());
        $this->assertEquals('220', $article->editorialId());
        $this->assertEquals(2692, $article->priceWithoutTaxes());
        $this->assertNull($article->illustrationsQty());
        $this->assertEquals(868, $article->weight());
        $this->assertEquals(170, $article->width());
        $this->assertEquals(240, $article->height());
        $this->assertNull($article->appearanceDate());
        $this->assertNull($article->externalDescription());
        $this->assertNull($article->tags());
        $this->assertNull($article->altLocation());
        $this->assertEquals(400, $article->taxes());
        $this->assertNull($article->rating());
        $this->assertNull($article->literaryQuality());
        $this->assertEquals(000, $article->referencePrice());
        $this->assertNull($article->freeField1());
        $this->assertNull($article->freeField2());
        $this->assertEquals(false, $article->wasAwarded());
        $this->assertEquals(false, $article->isPod());
        $this->assertNull($article->podDistributor());
        $this->assertNull($article->oldCode());
        $this->assertNull($article->size());
        $this->assertNull($article->color());
        $this->assertNull($article->originalLanguageId());
        $this->assertNull($article->originalTitle());
    }
}
