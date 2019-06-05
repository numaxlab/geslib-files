<?php

namespace NumaxLab\Geslib\Lines;

use Carbon\Carbon;

class Edition
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var string|null
     */
    private $editorial;

    /**
     * @var Carbon|null
     */
    private $date;

    /**
     * @var Carbon|null
     */
    private $reEditionDate;

    /**
     * Edition constructor.
     * @param string $number
     * @param string|null $editorial
     * @param Carbon|null $date
     * @param Carbon|null $reEditionDate
     */
    public function __construct($number, $editorial = null, $date = null, $reEditionDate = null)
    {
        $this->number = $number;
        $this->editorial = $editorial;
        $this->date = $date;
        $this->reEditionDate = $reEditionDate;
    }

    /**
     * @return string
     */
    public function number()
    {
        return $this->number;
    }

    /**
     * @return null|string
     */
    public function editorial()
    {
        return $this->editorial;
    }

    /**
     * @return Carbon|null
     */
    public function date()
    {
        return $this->date;
    }

    /**
     * @return Carbon|null
     */
    public function reEditionDate()
    {
        return $this->reEditionDate;
    }
}
