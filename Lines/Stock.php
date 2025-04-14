<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

final class Stock implements LineInterface
{
    public const CODE = 'B';

    private readonly string $articleId;
    private readonly int $quantity;

    public function __construct(string $articleId, int $quantity)
    {
        $this->articleId = $articleId;
        $this->quantity = $quantity;
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
        );
    }

    public function articleId(): string
    {
        return $this->articleId;
    }

    public function quantity(): int
    {
        return $this->quantity;
    }
}
