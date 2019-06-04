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

    /**
     * Action constructor.
     * @param string $code
     */
    private function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * @param $code
     * @return Action
     */
    public static function fromCode($code)
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

    /**
     * @return string
     */
    public function code()
    {
        return $this->code;
    }

    /**
     * @return bool
     */
    public function isAdd()
    {
        return $this->code === self::ADD;
    }

    /**
     * @return bool
     */
    public function isDelete()
    {
        return $this->code === self::DELETE;
    }

    /**
     * @return bool
     */
    public function isModify()
    {
        return $this->code === self::MODIFY;
    }
}
