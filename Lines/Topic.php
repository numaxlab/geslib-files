<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\GeslibFile;
use NumaxLab\Geslib\TypeCast;

class Topic implements LineInterface
{
    const CODE = '3';

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
    private $description;

    /**
     * @var string
     */
    private $descriptionEs;

    /**
     * @var string
     */
    private $descriptionEn;

    /**
     * Topic constructor.
     * @param Action $action
     * @param string $id
     * @param string $description
     * @param string $descriptionEs
     * @param string $descriptionEn
     */
    private function __construct(Action $action, $id, $description = null, $descriptionEs = null, $descriptionEn = null)
    {
        $this->action = $action;
        $this->id = $id;
        $this->description = $description;
        $this->descriptionEs = $descriptionEs;
        $this->descriptionEn = $descriptionEn;
    }

    /**
     * @param $id
     * @return Topic
     */
    private static function createWithDeleteAction($id)
    {
        return new self(Action::fromCode(Action::DELETE), $id);
    }

    /**
     * @param Action $action
     * @param $id
     * @param $description
     * @param $descriptionEs
     * @param $descriptionEn
     * @return Topic
     */
    private static function createWithAction(Action $action, $id, $description, $descriptionEs, $descriptionEn)
    {
        return new self($action, $id, $description, $descriptionEs, $descriptionEn);
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
    public function description()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function descriptionEs()
    {
        return $this->descriptionEs;
    }

    /**
     * @return string
     */
    public function descriptionEn()
    {
        return $this->descriptionEn;
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
