<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

// Assuming Action class is used

class ArticleBatchHeader implements LineInterface
{
    public const CODE = 'CLOTE';

    private readonly string $id;
    private readonly string $name;
    private readonly ?string $center;
    private readonly ?string $mnemonic;
    private readonly ?string $webInfo;
    private readonly ?string $categoryName;
    private readonly ?string $type;

    private function __construct(
        string $id,
        string $name,
        ?string $center = null,
        ?string $mnemonic = null,
        ?string $webInfo = null,
        ?string $categoryName = null,
        ?string $type = null,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->center = $center;
        $this->mnemonic = $mnemonic;
        $this->webInfo = $webInfo;
        $this->categoryName = $categoryName;
        $this->type = $type;
    }

    public static function getCode(): string
    {
        return self::CODE;
    }

    public static function fromLine(array $line): self
    {
        return new self(
            TypeCast::string($line[1]),
            TypeCast::string($line[2]),
            TypeCast::string($line[3]),
            TypeCast::string($line[4]),
            TypeCast::string($line[5]),
            TypeCast::string($line[6]),
            TypeCast::string($line[7]),
        );
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function center(): ?string
    {
        return $this->center;
    }

    public function mnemonic(): ?string
    {
        return $this->mnemonic;
    }

    public function webInfo(): ?string
    {
        return $this->webInfo;
    }

    public function categoryName(): ?string
    {
        return $this->categoryName;
    }

    public function type(): ?string
    {
        return $this->type;
    }
}
