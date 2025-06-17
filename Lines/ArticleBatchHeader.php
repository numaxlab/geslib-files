<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;
use NumaxLab\Geslib\Lines\Action; // Assuming Action class is used

class ArticleBatchHeader implements LineInterface
{
    public const CODE = 'CLOTE';

    private readonly Action $action;
    private readonly string $id;
    private ?string $batchDescription; // Example field

    private function __construct(Action $action, string $id, ?string $batchDescription = null)
    {
        $this->action = $action;
        $this->id = $id;
        $this->batchDescription = $batchDescription;
    }

    public static function getCode(): string
    {
        return self::CODE;
    }

    public static function fromLine(array $line): self
    {
        $action = Action::fromCode($line[1]);
        $id = TypeCast::string($line[2]);

        if ($action->isDelete()) {
            return self::createWithDeleteAction($id);
        }

        // Assuming batchDescription is in the 3rd position ($line[3])
        // Adjust the index as per actual geslib format for CLOTE
        return self::createWithAction(
            $action,
            $id,
            isset($line[3]) ? TypeCast::string($line[3]) : null
        );
    }

    public static function createWithDeleteAction(string $id): self
    {
        return new self(Action::fromCode(Action::DELETE), $id);
    }

    public static function createWithAction(Action $action, string $id, ?string $batchDescription): self
    {
        return new self($action, $id, $batchDescription);
    }

    public function action(): Action
    {
        return $this->action;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function batchDescription(): ?string
    {
        return $this->batchDescription;
    }
}
