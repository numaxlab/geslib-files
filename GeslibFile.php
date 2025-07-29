<?php

namespace NumaxLab\Geslib;

use NumaxLab\Geslib\Lines\LineInterface;

final class GeslibFile
{
    public const FIELD_SEPARATOR = '|';

    private bool $isInitialFile = false;
    private array $lines = [];

    public static function parse(string $input, string $eol = PHP_EOL): self
    {
        $parser = new Parser(new self(), $eol);

        if (!mb_check_encoding($input, 'UTF-8')) {
            $input = mb_convert_encoding($input, 'UTF-8', 'ISO-8859-1');
        }

        return $parser->parse($input);
    }

    public function setAsInitialFile(): void
    {
        $this->isInitialFile = true;
    }

    public function addLine(LineInterface $line): void
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
