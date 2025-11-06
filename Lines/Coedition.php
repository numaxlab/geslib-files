<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

class Coedition implements LineInterface
{
    public const CODE = 'COEDI';

    private readonly string $articleId;
    private readonly string $editorialId;

    public function __construct(string $articleId, string $editorialId)
    {
        $this->articleId = $articleId;
        $this->editorialId = $editorialId;
    }

    public static function getCode(): string
    {
        return self::CODE;
    }

    public static function fromLine(array $line): LineInterface
    {
        return new self(
            TypeCast::string($line[1]),
            TypeCast::string($line[2]),
        );
    }

    public function articleId(): string
    {
        return $this->articleId;
    }

    public function editorialId(): string
    {
        return $this->editorialId;
    }
}
