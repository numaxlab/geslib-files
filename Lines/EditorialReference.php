<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

final class EditorialReference implements LineInterface
{
    public const CODE = '6E';

    private readonly string $articleId;
    private readonly int $count;
    private readonly string $value;

    public function __construct(string $articleId, int $count, string $value)
    {
        $this->articleId = $articleId;
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
            TypeCast::integer($line[2]),
            TypeCast::string($line[3]),
        );
    }

    public function articleId(): string
    {
        return $this->articleId;
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
