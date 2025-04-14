<?php

namespace NumaxLab\Geslib\Lines;

use Carbon\Carbon;

final class Edition
{
    private readonly string $number;
    private ?string $editorial;
    private ?Carbon $date;
    private ?Carbon $reEditionDate;

    public function __construct(
        string $number,
        ?string $editorial = null,
        ?Carbon $date = null,
        ?Carbon $reEditionDate = null,
    ) {
        $this->number = $number;
        $this->editorial = $editorial;
        $this->date = $date;
        $this->reEditionDate = $reEditionDate;
    }

    public function number(): string
    {
        return $this->number;
    }

    public function editorial(): ?string
    {
        return $this->editorial;
    }

    public function date(): ?Carbon
    {
        return $this->date;
    }

    public function reEditionDate(): ?Carbon
    {
        return $this->reEditionDate;
    }
}