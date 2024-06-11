<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\Exceptions\InvalidActionException;

class Action
{
    const ADD = 'A';
    const DELETE = 'B';
    const MODIFY = 'M';

    /**
     * @var string
     */
    private $code;

    private function __construct(string $code)
    {
        $this->code = $code;
    }

    public static function fromCode(string $code): Action
    {
        if ($code === self::ADD) {
            return new self(self::ADD);
        }

        if ($code === self::DELETE) {
            return new self(self::DELETE);
        }

        if ($code === self::MODIFY) {
            return new self(self::MODIFY);
        }

        throw new InvalidActionException(sprintf('Invalid action with code %s', $code));
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
