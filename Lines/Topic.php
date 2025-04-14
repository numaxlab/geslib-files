<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

final class Topic implements LineInterface
{
    public const CODE = '3';

    private readonly Action $action;
    private readonly string $id;
    private ?string $description;
    private ?string $descriptionEs;
    private ?string $descriptionEn;

    private function __construct(
        Action $action,
        string $id,
        ?string $description = null,
        ?string $descriptionEs = null,
        ?string $descriptionEn = null,
    ) {
        $this->action = $action;
        $this->id = $id;
        $this->description = $description;
        $this->descriptionEs = $descriptionEs;
        $this->descriptionEn = $descriptionEn;
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
            TypeCast::string($line[4]),
            TypeCast::string($line[5]),
        );
    }

    private static function createWithDeleteAction(string $id): self
    {
        return new self(Action::fromCode(Action::DELETE), $id);
    }

    private static function createWithAction(
        Action $action,
        string $id,
        ?string $description,
        ?string $descriptionEs,
        ?string $descriptionEn,
    ): self {
        return new self($action, $id, $description, $descriptionEs, $descriptionEn);
    }

    public function action(): Action
    {
        return $this->action;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function descriptionEs(): ?string
    {
        return $this->descriptionEs;
    }

    public function descriptionEn(): ?string
    {
        return $this->descriptionEn;
    }
}