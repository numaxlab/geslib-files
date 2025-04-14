<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

final class RecordLabel implements LineInterface
{
    public const CODE = '1A';

    private readonly Action $action;
    private readonly string $id;
    private ?string $name;
    private ?string $externalName;
    private ?string $country;

    public function __construct(
        Action $action,
        string $id,
        ?string $name = null,
        ?string $externalName = null,
        ?string $country = null,
    ) {
        $this->action = $action;
        $this->id = $id;
        $this->name = $name;
        $this->externalName = $externalName;
        $this->country = $country;
    }

    public static function getCode(): string
    {
        return self::CODE;
    }

    public static function fromLine(array $line): self
    {
        return new self(
            Action::fromCode($line[1]),
            TypeCast::string($line[2]),
            TypeCast::string($line[3]),
            TypeCast::string($line[4]),
            TypeCast::string($line[5]),
        );
    }

    public function action(): Action
    {
        return $this->action;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): ?string
    {
        return $this->name;
    }

    public function externalName(): ?string
    {
        return $this->externalName;
    }

    public function country(): ?string
    {
        return $this->country;
    }
}
