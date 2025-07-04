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
    private readonly string $type;
    private readonly ?Carbon $createdAt;

    private function __construct(
        int $articleId,
        int $id,
        string $url,
        string $type,
        ?Carbon $createdAt,
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
        return new self(
            TypeCast::integer($line[1]),
            TypeCast::integer($line[2]),
            TypeCast::string($line[3]),
            TypeCast::string($line[4]),
            TypeCast::carbon($line[5]),
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

    public function createdAt(): ?Carbon
    {
        return $this->createdAt;
    }

    public function isImage(): bool
    {
        return $this->type === 'I';
    }

    public function isVideo(): bool
    {
        return $this->type === 'V';
    }
}
