<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\Exceptions\InvalidActionException;

final class Action
{
    public const ADD = 'A';
    public const DELETE = 'B';
    public const MODIFY = 'M';

    private readonly string $code;

    private function __construct(string $code)
    {
        $this->code = $code;
    }

    public static function fromCode(string $code): self
    {
        return match ($code) {
            self::ADD => new self(self::ADD),
            self::DELETE => new self(self::DELETE),
            self::MODIFY => new self(self::MODIFY),
            default => throw new InvalidActionException(sprintf('Invalid action with code %s', $code)),
        };
    }

    public function code(): string
    {
        return $this->code;
    }

    public function isAdd(): bool
    {
        return $this->code === self::ADD;
    }

    public function isDelete(): bool
    {
        return $this->code === self::DELETE;
    }

    public function isModify(): bool
    {
        return $this->code === self::MODIFY;
    }
}
