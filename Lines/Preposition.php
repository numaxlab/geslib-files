<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

final class Preposition implements LineInterface
{
    public const CODE = '9';

    private readonly string $value;

    public function __construct(string $value)
    {
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
        );
    }

    public function value(): string
    {
        return $this->value;
    }
}
