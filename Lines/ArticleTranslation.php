<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

class ArticleTranslation implements LineInterface
{
    const CODE = 'ATRA';

    private readonly int $articleId;
    private readonly string $languageId;
    private readonly ?string $description;
    private readonly ?string $externalDescription;

    private function __construct(
        int $articleId,
        string $languageId,
        ?string $description,
        ?string $externalDescription,
    ) {
        $this->articleId = $articleId;
        $this->languageId = $languageId;
        $this->description = $description;
        $this->externalDescription = $externalDescription;
    }

    public static function getCode(): string
    {
        return self::CODE;
    }

    public static function fromLine(array $line): self
    {
        return new self(
            TypeCast::integer($line[1]),
            TypeCast::string($line[2]),
            TypeCast::string($line[3]),
            TypeCast::string($line[4]),
        );
    }

    public function articleId(): int
    {
        return $this->articleId;
    }

    public function languageId(): string
    {
        return $this->languageId;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function externalDescription(): ?string
    {
        return $this->externalDescription;
    }
}
