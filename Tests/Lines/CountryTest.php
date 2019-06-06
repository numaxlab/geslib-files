<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\Country;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    public function testFromLine()
    {
        $country = Country::fromLine([
            'PAIS', 'PT', 'PORTUGAL', 'PT'
        ]);

        $this->assertEquals('PT', $country->id());
        $this->assertEquals('PORTUGAL', $country->name());
        $this->assertEquals('PT', $country->isoCode());
    }
}
