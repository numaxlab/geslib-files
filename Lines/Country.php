<?php

namespace NumaxLab\Geslib\Lines;

class Country implements LineInterface
{
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
    private $isoCode;

    /**
     * Country constructor.
     * @param string $id
     * @param string $name
     * @param string $isoCode
     */
    public function __construct($id, $name, $isoCode)
    {
        $this->id = $id;
        $this->name = $name;
        $this->isoCode = $isoCode;
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
    public function isoCode()
    {
        return $this->isoCode;
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
