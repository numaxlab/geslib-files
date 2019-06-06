<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\Action;
use NumaxLab\Geslib\Lines\Author;
use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase
{

    public function testFromLineWithDeleteAction()
    {
        $author = Author::fromLine([
            'AUT', 'B', '1'
        ]);

        $this->assertEquals(Action::DELETE, $author->action()->code());
        $this->assertEquals('1', $author->id());
    }

    public function testFromLineWithAddAction()
    {
        $author = Author::fromLine([
            'AUT', 'A', '1', 'Villaplana, Virginia'
        ]);

        $this->assertEquals(Action::ADD, $author->action()->code());
        $this->assertEquals('1', $author->id());
        $this->assertEquals('Villaplana, Virginia', $author->name());
    }
}
