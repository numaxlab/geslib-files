<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

final class ArtAdv implements LineInterface
{
    public const CODE = 'ARTADV';

    private readonly Action $action;
    private readonly string $id;
    private readonly int $code;
    private readonly string $description;

    private function __construct(
        Action $action,
        string $id,
        int $code,
        string $description
    ) {
        $this->action = $action;
        $this->id = $id;
        $this->code = $code;
        $this->description = $description;
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
            // For delete actions, only id is typically required.
            // We'll pass default values for others, though they won't be used.
            return new self(
                $action,
                $id,
                0, // Default for int, not used in delete
                '' // Default for string, not used in delete
            );
        }

        return new self(
            $action,
            $id,
            TypeCast::integer($line[3]),
            TypeCast::string($line[4])
        );
    }

    public static function createWithDeleteAction(string $id): self
    {
        return new self(
            Action::fromCode(Action::DELETE),
            $id,
            0, // Default for int, not used in delete
            '' // Default for string, not used in delete
        );
    }

    public static function createWithAction(
        Action $action,
        string $id,
        int $code,
        string $description
    ): self {
        return new self($action, $id, $code, $description);
    }

    public function action(): Action
    {
        return $this->action;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function code(): int
    {
        return $this->code;
    }

    public function description(): string
    {
        return $this->description;
    }
}
