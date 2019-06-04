<?php

namespace NumaxLab\Geslib\Lines;

class Collection implements LineInterface
{
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
     * @var string
     */
    private $name;

    /**
     * Collection constructor.
     * @param Action $action
     * @param string $editorialId
     * @param string $id
     * @param string $name
     */
    public function __construct(Action $action, $editorialId, $id, $name)
    {
        $this->action = $action;
        $this->editorialId = $editorialId;
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
            $line[3],
            $line[4]
        );
    }
}
