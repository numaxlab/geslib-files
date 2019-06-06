<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\GeslibFile;
use NumaxLab\Geslib\TypeCast;

class Classification implements LineInterface
{
    const CODE = 'CLASIF';

    /**
     * @var string
     */
    private $typeId;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * Classification constructor.
     * @param string $typeId
     * @param string $id
     * @param string $name
     */
    public function __construct($typeId, $id, $name)
    {
        $this->typeId = $typeId;
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function typeId()
    {
        return $this->typeId;
    }

    /**
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
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
            TypeCast::string($line[2]),
            TypeCast::string($line[3])
        );
    }
}
