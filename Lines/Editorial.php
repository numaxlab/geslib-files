<?php

namespace NumaxLab\Geslib\Lines;

class Editorial implements LineInterface
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
     * @var string
     */
    private $externalName;

    /**
     * @var string
     */
    private $country;

    /**
     * Editorial constructor.
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
