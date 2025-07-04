<?php

namespace NumaxLab\Geslib\Tests\Lines;

use NumaxLab\Geslib\Lines\Action;
use NumaxLab\Geslib\Lines\ArtAdv;
use PHPUnit\Framework\TestCase;

class ArtAdvTest extends TestCase
{
    public function testFromLineWithCreateAction()
    {
        $line = [
            ArtAdv::CODE, // Line code
            Action::ADD, // Action
            '12345', // ID
            '100', // Code
            'Sample Description', // Description
        ];

        $artAdv = ArtAdv::fromLine($line);

        $this->assertEquals(ArtAdv::CODE, $artAdv->getCode());
        $this->assertTrue($artAdv->action()->isAdd());
        $this->assertEquals('12345', $artAdv->id());
        $this->assertEquals(100, $artAdv->code());
        $this->assertEquals('Sample Description', $artAdv->description());
    }

    public function testFromLineWithUpdateAction()
    {
        $line = [
            ArtAdv::CODE,
            Action::MODIFY,
            '67890',
            '200',
            'Updated Description',
        ];

        $artAdv = ArtAdv::fromLine($line);

        $this->assertTrue($artAdv->action()->isModify());
        $this->assertEquals('67890', $artAdv->id());
        $this->assertEquals(200, $artAdv->code());
        $this->assertEquals('Updated Description', $artAdv->description());
    }

    public function testFromLineWithDeleteAction()
    {
        $line = [
            ArtAdv::CODE,
            Action::DELETE,
            '54321', // ID
            // For delete, other fields might be missing or empty,
            // but the fromLine method should handle it.
            // We pass empty strings as per current fromLine implementation for delete.
            '',
            '',
        ];

        $artAdv = ArtAdv::fromLine($line);

        $this->assertTrue($artAdv->action()->isDelete());
        $this->assertEquals('54321', $artAdv->id());
        // For delete action, specific values for other fields are not guaranteed or used.
        // The constructor defaults them if not provided (e.g. 0 for int, '' for string).
        $this->assertEquals(0, $artAdv->code());
        $this->assertEquals('', $artAdv->description());
    }

    public function testCreateWithDeleteActionFactory()
    {
        $artAdv = ArtAdv::createWithDeleteAction('deletedId');

        $this->assertTrue($artAdv->action()->isDelete());
        $this->assertEquals('deletedId', $artAdv->id());
        $this->assertEquals(0, $artAdv->code());
        $this->assertEquals('', $artAdv->description());
    }

    public function testCreateWithActionFactory()
    {
        $action = Action::fromCode(Action::ADD);
        $artAdv = ArtAdv::createWithAction(
            $action,
            'factoryId',
            300,
            'Factory Description'
        );

        $this->assertSame($action, $artAdv->action());
        $this->assertEquals('factoryId', $artAdv->id());
        $this->assertEquals(300, $artAdv->code());
        $this->assertEquals('Factory Description', $artAdv->description());
    }

    public function testGetCode()
    {
        $this->assertEquals('ARTADV', ArtAdv::getCode());
    }
}
