<?php

namespace NumaxLab\Geslib\Lines;

use Carbon\Carbon;
use NumaxLab\Geslib\TypeCast;

class ArticleResource implements LineInterface
{
    const CODE = 'ARTREC';

    private readonly int $articleId;
    private readonly int $id;
    private readonly string $url;
    private readonly string $type; // "I" for image, "V" for video
    private readonly Carbon $createdAt;

    private function __construct(
        int $articleId,
        int $id,
        string $url,
        string $type,
        Carbon $createdAt
    ) {
        $this->articleId = $articleId;
        $this->id = $id;
        $this->url = $url;
        $this->type = $type;
        $this->createdAt = $createdAt;
    }

    public static function getCode(): string
    {
        return self::CODE;
    }

    public static function fromLine(array $line): self
    {
        // Assuming $line[0] is the code 'ARTREC'
        // $line[1] is articleId
        // $line[2] is id
        // $line[3] is url
        // $line[4] is type
        // $line[5] is createdAt
        return self::createWithData(
            TypeCast::integer($line[1]), // articleId
            TypeCast::integer($line[2]), // id
            TypeCast::string($line[3]),  // url
            TypeCast::string($line[4]),  // type
            TypeCast::carbonYmd($line[5]) // createdAt (Ymd format)
        );
    }

    public static function createWithData(
        int $articleId,
        int $id,
        string $url,
        string $type,
        Carbon $createdAt
    ): self {
        return new self(
            $articleId,
            $id,
            $url,
            $type,
            $createdAt
        );
    }

    public function articleId(): int
    {
        return $this->articleId;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function url(): string
    {
        return $this->url;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function createdAt(): Carbon
    {
        return $this->createdAt;
    }
}
