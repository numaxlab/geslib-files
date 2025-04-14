<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

final class Author implements LineInterface
{
    public const CODE = 'AUT';

    private readonly Action $action;
    private readonly string $id;
    private ?string $name;

    private function __construct(Action $action, string $id, ?string $name = null)
    {
        $this->action = $action;
        $this->id = $id;
        $this->name = $name;
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

        return self::createWithAction(
            $action,
            $id,
            TypeCast::string($line[3]),
        );
    }

    public static function createWithDeleteAction(string $id): self
    {
        return new self(Action::fromCode(Action::DELETE), $id);
    }

    public static function createWithAction(Action $action, string $id, ?string $name): self
    {
        return new self($action, $id, $name);
    }

    public function action(): Action
    {
        return $this->action;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): ?string
    {
        return $this->name;
    }
}
