<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

final class ArticleAuthor implements LineInterface
{
    public const CODE = 'LA';

    private readonly string $articleId;
    private readonly string $authorId;
    private readonly AuthorType $authorType;
    private readonly int $position;

    public function __construct(
        string $articleId,
        string $authorId,
        AuthorType $authorType,
        int $position,
    ) {
        $this->articleId = $articleId;
        $this->authorId = $authorId;
        $this->authorType = $authorType;
        $this->position = $position;
    }

    public static function getCode(): string
    {
        return self::CODE;
    }

    public static function fromLine(array $line): self
    {
        return new self(
            TypeCast::string($line[1]),
            TypeCast::string($line[2]),
            AuthorType::fromCode($line[3]),
            TypeCast::integer($line[4]),
        );
    }

    public function articleId(): string
    {
        return $this->articleId;
    }

    public function authorId(): string
    {
        return $this->authorId;
    }

    public function authorType(): AuthorType
    {
        return $this->authorType;
    }

    public function position(): int
    {
        return $this->position;
    }
}
