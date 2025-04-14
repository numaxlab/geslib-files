<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

final class Collection implements LineInterface
{
    public const CODE = '2';

    private readonly Action $action;
    private readonly string $editorialId;
    private readonly string $id;
    private readonly ?string $name;

    private function __construct(
        Action $action,
        string $editorialId,
        string $id,
        ?string $name = null,
    ) {
        $this->action = $action;
        $this->editorialId = $editorialId;
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
        $editorialId = TypeCast::string($line[2]);
        $id = TypeCast::string($line[3]);

        if ($action->isDelete()) {
            return self::createWithDeleteAction($editorialId, $id);
        }

        return self::createWithAction(
            $action,
            $editorialId,
            $id,
            TypeCast::string($line[4]),
        );
    }

    public static function createWithDeleteAction(string $editorialId, string $id): self
    {
        return new self(Action::fromCode(Action::DELETE), $editorialId, $id);
    }

    public static function createWithAction(
        Action $action,
        string $editorialId,
        string $id,
        ?string $name,
    ): self {
        return new self($action, $editorialId, $id, $name);
    }

    public function action(): Action
    {
        return $this->action;
    }

    public function editorialId(): string
    {
        return $this->editorialId;
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
