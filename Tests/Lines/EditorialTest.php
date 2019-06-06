<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\Action;
use NumaxLab\Geslib\Lines\Editorial;
use PHPUnit\Framework\TestCase;

class EditorialTest extends TestCase
{
    public function testFromLineWithDeleteAction()
    {
        $editorial = Editorial::fromLine([
            '1L', 'B', '4'
        ]);

        $this->assertEquals(Action::DELETE, $editorial->action()->code());
        $this->assertEquals('4', $editorial->id());
    }

    public function testFromLineWithAddAction()
    {
        $editorial = Editorial::fromLine([
            '1L', 'A', '4', 'Penguin', 'PENGUIN', 'ES'
        ]);

        $this->assertEquals(Action::ADD, $editorial->action()->code());
        $this->assertEquals('4', $editorial->id());
        $this->assertEquals('Penguin', $editorial->name());
        $this->assertEquals('PENGUIN', $editorial->externalName());
        $this->assertEquals('ES', $editorial->countryId());
    }
}
