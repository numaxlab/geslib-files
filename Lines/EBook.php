<?php

namespace NumaxLab\Geslib\Lines;

final class EBook extends Article
{
    public const CODE = 'EB';

    public static function getCode(): string
    {
        return self::CODE;
    }
}
