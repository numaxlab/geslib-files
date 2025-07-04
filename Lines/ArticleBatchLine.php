<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

// Assuming Action class is used

class ArticleBatchLine implements LineInterface
{
    public const CODE = 'LLOTE';

    private readonly string $batchId;
    private int $articleId;
    private ?string $reference;
    private ?int $quantity;

    private function __construct(string $batchId, int $articleId, ?string $reference = null, ?int $quantity = null)
    {
        $this->batchId = $batchId;
        $this->articleId = $articleId;
        $this->reference = $reference;
        $this->quantity = $quantity;
    }

    public static function getCode(): string
    {
        return self::CODE;
    }

    public static function fromLine(array $line): self
    {
        return new self(
            TypeCast::string($line[1]),
            TypeCast::integer($line[2]),
            TypeCast::string($line[3]),
            TypeCast::integer($line[4]),
        );
    }

    public function batchId(): string
    {
        return $this->batchId;
    }

    public function articleId(): int
    {
        return $this->articleId;
    }

    public function reference(): ?string
    {
        return $this->reference;
    }

    public function quantity(): ?int
    {
        return $this->quantity;
    }
}
