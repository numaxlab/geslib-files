<?php

namespace NumaxLab\Geslib\Lines;

class Stock implements LineInterface
{
    /**
     * @var string
     */
    private $articleId;

    /**
     * @var int
     */
    private $quantity;

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
        return new self();
    }
}
