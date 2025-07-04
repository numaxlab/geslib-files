<?php

namespace NumaxLab\Geslib\Tests\Lines;

use Carbon\Carbon;
use NumaxLab\Geslib\Lines\ArticleResource;
use PHPUnit\Framework\TestCase;

class ArticleResourceTest extends TestCase
{
    public function testGetCode()
    {
        $this->assertEquals('ARTREC', ArticleResource::getCode());
    }

    public function testFromLineCreatesCorrectObject()
    {
        $line = [
            'ARTREC', // Code
            '123',    // articleId
            '456',    // id
            'http://example.com/image.jpg', // url
            'I',      // type
            '20230115' // createdAt (Ymd)
        ];

        $articleResource = ArticleResource::fromLine($line);

        $this->assertInstanceOf(ArticleResource::class, $articleResource);
        $this->assertEquals(123, $articleResource->articleId());
        $this->assertEquals(456, $articleResource->id());
        $this->assertEquals('http://example.com/image.jpg', $articleResource->url());
        $this->assertEquals('I', $articleResource->type());
        $this->assertInstanceOf(Carbon::class, $articleResource->createdAt());
        $this->assertEquals('2023-01-15', $articleResource->createdAt()->toDateString());
    }

    public function testGettersReturnCorrectValues()
    {
        $articleId = 999;
        $id = 888;
        $url = 'http://example.com/video.mp4';
        $type = 'V';
        $createdAt = Carbon::createFromFormat('Ymd', '20241231');

        $articleResource = ArticleResource::createWithData(
            $articleId,
            $id,
            $url,
            $type,
            $createdAt
        );

        $this->assertEquals($articleId, $articleResource->articleId());
        $this->assertEquals($id, $articleResource->id());
        $this->assertEquals($url, $articleResource->url());
        $this->assertEquals($type, $articleResource->type());
        $this->assertSame($createdAt, $articleResource->createdAt());
    }

    public function testTypeValidation()
    {
        // This test assumes that the type 'I' and 'V' are valid.
        // The current implementation does not enforce this in the class itself,
        // but this test documents the expectation.
        $lineImage = ['ARTREC', '1', '2', 'url', 'I', '20230101'];
        $articleImage = ArticleResource::fromLine($lineImage);
        $this->assertEquals('I', $articleImage->type());

        $lineVideo = ['ARTREC', '3', '4', 'url', 'V', '20230102'];
        $articleVideo = ArticleResource::fromLine($lineVideo);
        $this->assertEquals('V', $articleVideo->type());

        // If specific error handling for invalid types is added,
        // tests for that (e.g., expecting an exception) should be included here.
        // For example:
        // try {
        //     $lineInvalid = ['ARTREC', '5', '6', 'url', 'X', '20230103'];
        //     ArticleResource::fromLine($lineInvalid);
        //     $this->fail('Expected InvalidArgumentException for invalid type');
        // } catch (\InvalidArgumentException $e) {
        //     // Expected
        // }
    }

    public function testCreatedAtParsingYmd()
    {
        $line = [
            'ARTREC', '10', '11', 'http://example.com/resource', 'I', '20221120'
        ];
        $articleResource = ArticleResource::fromLine($line);
        $this->assertEquals('2022-11-20', $articleResource->createdAt()->toDateString());
    }
}
