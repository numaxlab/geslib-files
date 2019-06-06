<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\GeslibFile;
use NumaxLab\Geslib\TypeCast;

class RecordLabel implements LineInterface
{
    const CODE = '1A';

    /**
     * @var Action
     */
    private $action;

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
    private $externalName;

    /**
     * @var string
     */
    private $country;

    /**
     * RecordLabel constructor.
     * @param Action $action
     * @param string $id
     * @param string $name
     * @param string $externalName
     * @param string $country
     */
    public function __construct(Action $action, $id, $name, $externalName, $country)
    {
        $this->action = $action;
        $this->id = $id;
        $this->name = $name;
        $this->externalName = $externalName;
        $this->country = $country;
    }

    /**
     * @return Action
     */
    public function action()
    {
        return $this->action;
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
    public function externalName()
    {
        return $this->externalName;
    }

    /**
     * @return string
     */
    public function country()
    {
        return $this->country;
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
            Action::fromCode($line[1]),
            TypeCast::string($line[2]),
            TypeCast::string($line[3]),
            TypeCast::string($line[4]),
            TypeCast::string($line[5])
        );
    }
}
