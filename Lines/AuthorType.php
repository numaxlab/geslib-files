<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\Exceptions\InvalidAuthorTypeException;

final class AuthorType
{
    public const AUTHOR = 'A';
    public const ILLUSTRATOR = 'I';
    public const BACK_COVER_ILLUSTRATOR = 'IC';
    public const COVER_ILLUSTRATOR = 'IP';
    public const TRANSLATOR = 'T';

    private readonly string $code;

    private function __construct(string $code)
    {
        $this->code = $code;
    }

    public static function fromCode(string $code): self
    {
        return match ($code) {
            self::AUTHOR => new self(self::AUTHOR),
            self::ILLUSTRATOR => new self(self::ILLUSTRATOR),
            self::BACK_COVER_ILLUSTRATOR => new self(self::BACK_COVER_ILLUSTRATOR),
            self::COVER_ILLUSTRATOR => new self(self::COVER_ILLUSTRATOR),
            self::TRANSLATOR => new self(self::TRANSLATOR),
            default => throw new InvalidAuthorTypeException(sprintf('Invalid author type with code %s', $code)),
        };
    }

    public function code(): string
    {
        return $this->code;
    }
}
