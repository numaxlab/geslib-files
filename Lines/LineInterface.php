<?php

namespace NumaxLab\Geslib\Lines;

interface LineInterface
{
    public static function getCode(): string;

    public static function fromLine(array $line): self;
}
