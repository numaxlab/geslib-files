<?php

namespace NumaxLab\Geslib\Lines;

class Author implements LineInterface
{
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
     * Author constructor.
     * @param Action $action
     * @param string $id
     * @param string $name
     */
    public function __construct(Action $action, $id, $name)
    {
        $this->action = $action;
        $this->id = $id;
        $this->name = $name;
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
            Action::fromCode($line[1]),
            $line[2],
            $line[3]
        );
    }
}
