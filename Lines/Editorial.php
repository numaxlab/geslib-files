<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\GeslibFile;
use NumaxLab\Geslib\TypeCast;

class Editorial implements LineInterface
{
    const CODE = '1L';

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
    private $countryId;

    /**
     * Editorial constructor.
     * @param Action $action
     * @param string $id
     * @param string|null $name
     * @param string|null $externalName
     * @param string|null $countryId
     */
    private function __construct(Action $action, $id, $name = null, $externalName = null, $countryId = null)
    {
        $this->action = $action;
        $this->id = $id;
        $this->name = $name;
        $this->externalName = $externalName;
        $this->countryId = $countryId;
    }

    /**
     * @param string $id
     * @return Editorial
     */
    public static function createWithDeleteAction($id)
    {
        return new self(Action::fromCode(Action::DELETE), $id);
    }

    /**
     * @param Action $action
     * @param string $id
     * @param string $name
     * @param $externalName
     * @param $countryId
     * @return Editorial
     */
    public static function createWithAction(Action $action, $id, $name, $externalName, $countryId)
    {
        return new self($action, $id, $name, $externalName, $countryId);
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
    public function countryId()
    {
        return $this->countryId;
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
        $action = Action::fromCode($line[1]);

        $id = TypeCast::string($line[2]);

        if ($action->isDelete()) {
            return self::createWithDeleteAction($id);
        }

        return self::createWithAction(
            $action,
            $id,
            TypeCast::string($line[3]),
            TypeCast::string($line[4]),
            TypeCast::string($line[5])
        );
    }
}
