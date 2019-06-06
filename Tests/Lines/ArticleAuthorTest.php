<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\ArticleAuthor;
use NumaxLab\Geslib\Lines\AuthorType;
use PHPUnit\Framework\TestCase;

class ArticleAuthorTest extends TestCase
{
    public function testFromLine()
    {
        $articleAuthor = ArticleAuthor::fromLine([
            'LA', '11', '22', 'A', '1'
        ]);

        $this->assertEquals('11', $articleAuthor->articleId());
        $this->assertEquals('22', $articleAuthor->authorId());
        $this->assertEquals(AuthorType::AUTHOR,$articleAuthor->authorType()->code());
        $this->assertEquals(1, $articleAuthor->position());
    }
}
