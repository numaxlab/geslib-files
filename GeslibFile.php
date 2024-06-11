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

    public function __construct()
    {
        $this->isInitialFile = false;
        $this->lines = [];
    }

    public static function parse(string $input, string $eol = PHP_EOL): GeslibFile
    {
        $parser = new Parser(new self(), $eol);

        return $parser->parse($input);
    }

    public function setAsInitialFile()
    {
        $this->isInitialFile = true;
    }

    public function addLine(LineInterface $line)
    {
        $this->lines[] = $line;
    }

    public function isInitialFile(): bool
    {
        return $this->isInitialFile;
    }

    public function lines(): array
    {
        return $this->lines;
    }
}
