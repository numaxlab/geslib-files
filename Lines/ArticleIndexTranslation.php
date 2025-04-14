<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

final class ArticleIndexTranslation implements LineInterface
{
    public const CODE = '6TI';

    private readonly string $articleId;
    private readonly string $languageId;
    private readonly int $count;
    private readonly string $value;

    public function __construct(
        string $articleId,
        string $languageId,
        int $count,
        string $value,
    ) {
        $this->articleId = $articleId;
        $this->languageId = $languageId;
        $this->count = $count;
        $this->value = $value;
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
            TypeCast::integer($line[3]),
            TypeCast::string($line[4]),
        );
    }

    public function articleId(): string
    {
        return $this->articleId;
    }

    public function languageId(): string
    {
        return $this->languageId;
    }

    public function count(): int
    {
        return $this->count;
    }

    public function value(): string
    {
        return $this->value;
    }
}
