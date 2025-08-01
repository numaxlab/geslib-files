<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\GeslibFile;
use NumaxLab\Geslib\TypeCast;

final class ArticleTopic implements LineInterface
{
    public const CODE = '5';

    private readonly string $topicId;
    private readonly string $articleId;

    public function __construct(string $topicId, string $articleId)
    {
        $this->topicId = $topicId;
        $this->articleId = $articleId;
    }

    public static function fromLine(array $line): self
    {
        return new self(
            TypeCast::string($line[1]),
            TypeCast::string($line[2]),
        );
    }

    public function toLine(): string
    {
        return implode(
            GeslibFile::FIELD_SEPARATOR,
            [
                self::getCode(),
                $this->topicId,
                $this->articleId,
            ],
        );
    }

    public static function getCode(): string
    {
        return self::CODE;
    }

    public function topicId(): string
    {
        return $this->topicId;
    }

    public function articleId(): string
    {
        return $this->articleId;
    }
}
