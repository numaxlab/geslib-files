<?php

namespace NumaxLab\Geslib\Lines;

class Topic implements LineInterface
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
    public function __construct(Action $action, $id, $description, $descriptionEs, $descriptionEn)
    {
        $this->action = $action;
        $this->id = $id;
        $this->description = $description;
        $this->descriptionEs = $descriptionEs;
        $this->descriptionEn = $descriptionEn;
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
            $line[4],
            $line[5]
        );
    }
}
