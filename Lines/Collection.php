<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\GeslibFile;
use NumaxLab\Geslib\TypeCast;

class Collection implements LineInterface
{
    const CODE = '2';

    /**
     * @var Action
     */
    private $action;

    /**
     * @var string
     */
    private $editorialId;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * Collection constructor.
     * @param Action $action
     * @param string $editorialId
     * @param string $id
     * @param string|null $name
     */
    private function __construct(Action $action, $editorialId, $id, $name = null)
    {
        $this->action = $action;
        $this->editorialId = $editorialId;
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @param string $editorialId
     * @param string $id
     * @return Collection
     */
    public static function createWithDeleteAction($editorialId, $id)
    {
        return new self(Action::fromCode(Action::DELETE), $editorialId, $id);
    }

    /**
     * @param Action $action
     * @param string $editorialId
     * @param string $id
     * @param string $name
     * @return Collection
     */
    public static function createWithAction(Action $action, $editorialId,  $id, $name)
    {
        return new self($action, $editorialId, $id, $name);
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
    public function editorialId()
    {
        return $this->editorialId;
    }

    /**
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string|null
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
        $action = Action::fromCode($line[1]);

        $editorialId = TypeCast::string($line[2]);
        $id = TypeCast::string($line[3]);

        if ($action->isDelete()) {
            return self::createWithDeleteAction($editorialId, $id);
        }

        return self::createWithAction(
            $action,
            $editorialId,
            $id,
            TypeCast::string($line[4])
        );
    }
}
