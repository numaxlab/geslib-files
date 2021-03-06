<?php

namespace NumaxLab\Geslib\Lines;

interface LineInterface
{
    /**
     * @return string
     */
    public static function getCode();

    /**
     * @return string
     */
    public function toLine();

    /**
     * @param array $line
     * @return self
     */
    public static function fromLine($line);
}
