<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

final class Warning implements LineInterface
{
    public const CODE = 'ARTADV';

    private readonly string $id;
    private readonly int $sort;
    private readonly string $description;

    private function __construct(
        string $id,
        int $code,
        string $description,
    ) {
        $this->id = $id;
        $this->sort = $code;
        $this->description = $description;
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

    public function id(): string
    {
        return $this->id;
    }

    public function sort(): int
    {
        return $this->sort;
    }

    public function description(): string
    {
        return $this->description;
    }
}
