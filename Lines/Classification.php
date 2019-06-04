<?php

namespace NumaxLab\Geslib\Lines;

class Classification implements LineInterface
{
    /**
     * @var string
     */
    private $typeId;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * Classification constructor.
     * @param string $typeId
     * @param string $id
     * @param string $name
     */
    public function __construct($typeId, $id, $name)
    {
        $this->typeId = $typeId;
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function typeId()
    {
        return $this->typeId;
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
            $line[1],
            $line[2],
            $line[3]
        );
    }
}
