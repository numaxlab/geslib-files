<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

final class Classification implements LineInterface
{
    public const CODE = 'CLASIF';

    private readonly string $typeId;
    private readonly string $id;
    private readonly string $name;

    public function __construct(string $typeId, string $id, string $name)
    {
        $this->typeId = $typeId;
        $this->id = $id;
        $this->name = $name;
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
            TypeCast::string($line[3]),
        );
    }

    public function typeId(): string
    {
        return $this->typeId;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}
