<?php

namespace NumaxLab\Geslib;

use Carbon\Carbon;
use Carbon\CarbonInterface;

final class TypeCast
{
    public static function string(string $value): ?string
    {
        $value = trim($value);

        if ($value === '') {
            return null;
        }

        return $value;
    }

    public static function integer(string $value): ?int
    {
        $value = trim($value);

        if ($value === '') {
            return null;
        }

        return (int)$value;
    }

    public static function boolean(string $value): bool
    {
        return $value === 'S';
    }

    public static function integerMoney(string $value): ?int
    {
        $value = trim($value);

        if ($value === '') {
            return null;
        }

        return (int)str_replace(',', '', $value);
    }

    public static function carbon(string $value): ?CarbonInterface
    {
        $value = trim($value);

        if ($value === '') {
            return null;
        }

        return Carbon::createFromFormat('Ymd', $value);
    }
}
