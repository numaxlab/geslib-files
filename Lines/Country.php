<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\GeslibFile;
use NumaxLab\Geslib\TypeCast;

class Country implements LineInterface
{
    const CODE = 'PAIS';

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $isoCode;

    /**
     * Country constructor.
     * @param string $id
     * @param string $name
     * @param string $isoCode
     */
    public function __construct($id, $name, $isoCode)
    {
        $this->id = $id;
        $this->name = $name;
        $this->isoCode = $isoCode;
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
    public function isoCode()
    {
        return $this->isoCode;
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
