<?php

namespace NumaxLab\Geslib\Lines;

class Preposition implements LineInterface
{
    /**
     * @var string
     */
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function toLine()
    {
        // TODO: Implement toLine() method.
    }

    /**
     * @param array $line
     * @return self
     */
    public static function fromLine($line)
    {
        return new self(
            $line[1]
        );
    }
}
