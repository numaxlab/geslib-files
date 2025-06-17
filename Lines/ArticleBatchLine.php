<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;
use NumaxLab\Geslib\Lines\Action; // Assuming Action class is used

class ArticleBatchLine implements LineInterface
{
    public const CODE = 'LLOTE';

    private readonly Action $action;
    private readonly string $id; // Or maybe a composite key with BatchId?
    private ?string $articleId; // Example field: Foreign key to Article
    private ?int $quantity; // Example field

    private function __construct(Action $action, string $id, ?string $articleId = null, ?int $quantity = null)
    {
        $this->action = $action;
        $this->id = $id;
        $this->articleId = $articleId;
        $this->quantity = $quantity;
    }

    public static function getCode(): string
    {
        return self::CODE;
    }

    public static function fromLine(array $line): self
    {
        $action = Action::fromCode($line[1]);
        $id = TypeCast::string($line[2]); // Assuming ID is the second field

        if ($action->isDelete()) {
            return self::createWithDeleteAction($id);
        }

        // Assuming articleId is in $line[3] and quantity in $line[4]
        // Adjust indices as per actual geslib format for LLOTE
        return self::createWithAction(
            $action,
            $id,
            isset($line[3]) ? TypeCast::string($line[3]) : null,
            isset($line[4]) ? TypeCast::integer($line[4]) : null
        );
    }

    public static function createWithDeleteAction(string $id): self
    {
        // Consider if other fields are needed for deletion context
        return new self(Action::fromCode(Action::DELETE), $id);
    }

    public static function createWithAction(Action $action, string $id, ?string $articleId, ?int $quantity): self
    {
        return new self($action, $id, $articleId, $quantity);
    }

    public function action(): Action
    {
        return $this->action;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function articleId(): ?string
    {
        return $this->articleId;
    }

    public function quantity(): ?int
    {
        return $this->quantity;
    }
}
