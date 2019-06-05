<?php

namespace NumaxLab\Geslib;

use Carbon\Carbon;

class TypeCast
{
    /**
     * @param string $value
     * @return null|string
     */
    public static function string($value)
    {
        $value = trim($value);

        if ($value === '') {
            return null;
        }

        return $value;
    }

    /**
     * @param string $value
     * @return int|null
     */
    public static function integer($value)
    {
        $value = trim($value);

        if ($value === '') {
            return null;
        }

        return (int) $value;
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function boolean($value)
    {
        return $value === 'S';
    }

    /**
     * @param string $value
     * @return int|null
     */
    public static function integerMoney($value)
    {
        $value = trim($value);

        if ($value === '') {
            return null;
        }

        return (int) str_replace(',', '', $value);
    }

    /**
     * @param string $value
     * @return \Carbon\CarbonInterface|null
     */
    public static function carbon($value)
    {
        $value = trim($value);

        if ($value === '') {
            return null;
        }

        return Carbon::createFromFormat('Ymd', $value);
    }
}
