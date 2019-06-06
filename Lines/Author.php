<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\GeslibFile;
use NumaxLab\Geslib\TypeCast;

class Author implements LineInterface
{
    const CODE = 'AUT';

    /**
     * @var Action
     */
    private $action;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * Author constructor.
     * @param Action $action
     * @param string $id
     * @param string|null $name
     */
    private function __construct(Action $action, $id, $name = null)
    {
        $this->action = $action;
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @param string $id
     * @return Author
     */
    public static function createWithDeleteAction($id)
    {
        return new self(Action::fromCode(Action::DELETE), $id);
    }

    /**
     * @param Action $action
     * @param string $id
     * @param string $name
     * @return Author
     */
    public static function createWithAction(Action $action, $id, $name)
    {
        return new self($action, $id, $name);
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

        $id = TypeCast::string($line[2]);

        if ($action->isDelete()) {
            return self::createWithDeleteAction($id);
        }

        return self::createWithAction(
            $action,
            $id,
            TypeCast::string($line[3])
        );
    }
}
