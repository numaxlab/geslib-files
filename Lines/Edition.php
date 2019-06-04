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
     * @var string
     */
    private $editorial;

    /**
     * @var Carbon
     */
    private $date;

    /**
     * @var Carbon|null
     */
    private $reEditionDate;

    /**
     * Edition constructor.
     * @param string $number
     * @param string $editorial
     * @param Carbon $date
     * @param Carbon|null $reEditionDate
     */
    public function __construct($number, $editorial, Carbon $date, Carbon $reEditionDate)
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
     * @return string
     */
    public function editorial()
    {
        return $this->editorial;
    }

    /**
     * @return Carbon
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
