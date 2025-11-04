<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

final class CenterStock implements LineInterface
{
    public const CODE = 'B2';

    private readonly string $centerId;
    private readonly string $articleId;
    private readonly int $quantity;

    public function __construct(string $centerId, string $articleId, int $quantity)
    {
        $this->centerId = $centerId;
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
            TypeCast::string($line[2]),
            TypeCast::integer($line[3]),
        );
    }

    public function centerId(): string
    {
        return $this->centerId;
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
