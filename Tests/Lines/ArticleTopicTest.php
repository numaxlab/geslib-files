<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\ArticleTopic;
use PHPUnit\Framework\TestCase;

class ArticleTopicTest extends TestCase
{
    public function testFromLine()
    {
        $articleTopic = ArticleTopic::fromLine([
            '5', '0', '34326'
        ]);

        $this->assertEquals('0', $articleTopic->topicId());
        $this->assertEquals('34326', $articleTopic->articleId());
    }
}
