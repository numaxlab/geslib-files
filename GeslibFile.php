<?php

namespace NumaxLab\Geslib;

use NumaxLab\Geslib\Lines\LineInterface;

class GeslibFile
{
    const FIELD_SEPARATOR = '|';

    /**
     * @var bool
     */
    private $isInitialFile;

    /**
     * @var array
     */
    private $lines;

    /**
     * GeslibFile constructor.
     */
    public function __construct()
    {
        $this->isInitialFile = false;
        $this->lines = [];
    }

    /**
     *
     */
    public function setAsInitialFile()
    {
        $this->isInitialFile = true;
    }

    /**
     * @param LineInterface $line
     */
    public function addLine(LineInterface $line)
    {
        $this->lines[] = $line;
    }

    /**
     * @return bool
     */
    public function isInitialFile()
    {
        return $this->isInitialFile;
    }

    /**
     * @return array
     */
    public function lines()
    {
        return $this->lines;
    }

    /**
     * @param string $input
     * @param string $eol
     * @return GeslibFile
     */
    public static function parse($input, $eol = PHP_EOL)
    {
        $parser = new Parser(new self(), $eol);

        return $parser->parse($input);
    }
}
