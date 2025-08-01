<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\GeslibFile;
use NumaxLab\Geslib\TypeCast;

final class Ibic implements LineInterface
{
    public const CODE = 'BIC';

    private readonly string $articleId;
    private readonly string $code;
    private readonly string $description;

    public function __construct(string $articleId, string $code, string $description)
    {
        $this->articleId = $articleId;
        $this->code = $code;
        $this->description = $description;
    }

    public static function fromLine(array $line): self
    {
        return new self(
            TypeCast::string($line[1]),
            TypeCast::string($line[2]),
            TypeCast::string($line[3]),
        );
    }

    public function toLine(): string
    {
        return implode(
            GeslibFile::FIELD_SEPARATOR,
            [
                self::getCode(),
                $this->articleId,
                $this->code,
                $this->description,
            ],
        );
    }

    public static function getCode(): string
    {
        return self::CODE;
    }

    public function articleId(): string
    {
        return $this->articleId;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function description(): string
    {
        return $this->description;
    }
}
