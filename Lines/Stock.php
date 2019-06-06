<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\GeslibFile;
use NumaxLab\Geslib\TypeCast;

class Stock implements LineInterface
{
    const CODE = 'B';

    /**
     * @var string
     */
    private $articleId;

    /**
     * @var int
     */
    private $quantity;

    /**
     * Stock constructor.
     * @param string $articleId
     * @param int $quantity
     */
    public function __construct($articleId, $quantity)
    {
        $this->articleId = $articleId;
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function articleId()
    {
        return $this->articleId;
    }

    /**
     * @return int
     */
    public function quantity()
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public static function getCode()
    {
        return self::CODE;
    }

    /**
     * @return string
     */
    public function toLine()
    {
        return self::CODE.GeslibFile::FIELD_SEPARATOR;
    }

    /**
     * @param array $line
     * @return self
     */
    public static function fromLine($line)
    {
        return new self(
            TypeCast::string($line[1]),
            TypeCast::integer($line[2])
        );
    }
}
