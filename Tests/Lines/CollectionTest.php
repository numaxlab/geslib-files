<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\Action;
use NumaxLab\Geslib\Lines\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function testFromLineWithDeleteAction()
    {
        $collection = Collection::fromLine([
            '2', 'B', '1', '1'
        ]);

        $this->assertEquals(Action::DELETE, $collection->action()->code());
        $this->assertEquals('1', $collection->editorialId());
        $this->assertEquals('1', $collection->id());
    }

    public function testFromLineWithAddAction()
    {
        $collection = Collection::fromLine([
            '2', 'A', '1', '1', '< Genérica >'
        ]);

        $this->assertEquals(Action::ADD, $collection->action()->code());
        $this->assertEquals('1', $collection->editorialId());
        $this->assertEquals('1', $collection->id());
        $this->assertEquals('< Genérica >', $collection->name());
    }
}
