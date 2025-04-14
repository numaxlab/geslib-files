<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

final class Country implements LineInterface
{
    public const CODE = 'PAIS';

    private readonly string $id;
    private readonly string $name;
    private readonly ?string $isoCode;

    public function __construct(string $id, string $name, ?string $isoCode)
    {
        $this->id = $id;
        $this->name = $name;
        $this->isoCode = $isoCode;
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

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function isoCode(): ?string
    {
        return $this->isoCode;
    }
}
