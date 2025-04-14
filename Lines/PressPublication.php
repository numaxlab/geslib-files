<?php

namespace NumaxLab\Geslib\Lines;

final class PressPublication implements LineInterface
{
    public const CODE = '1R';

    private readonly Action $action;
    private readonly string $id;
    private readonly string $name;
    private readonly string $countryId;

    public function __construct(
        Action $action,
        string $id,
        string $name,
        string $countryId,
    ) {
        $this->action = $action;
        $this->id = $id;
        $this->name = $name;
        $this->countryId = $countryId;
    }

    public static function getCode(): string
    {
        return self::CODE;
    }

    public static function fromLine(array $line): self
    {
        return new self(
            Action::fromCode($line[1]),
            $line[2],
            $line[3],
            $line[4],
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

    public function name(): string
    {
        return $this->name;
    }

    public function countryId(): string
    {
        return $this->countryId;
    }
}
