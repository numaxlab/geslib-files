<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

final class AuthorBiography implements LineInterface
{
    public const CODE = 'AUTBIO';

    private readonly string $authorId;
    private readonly string $biography;

    public function __construct(string $authorId, string $biography)
    {
        $this->authorId = $authorId;
        $this->biography = $biography;
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
        );
    }

    public function authorId(): string
    {
        return $this->authorId;
    }

    public function biography(): string
    {
        return $this->biography;
    }
}
