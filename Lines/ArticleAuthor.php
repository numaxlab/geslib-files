<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\GeslibFile;
use NumaxLab\Geslib\TypeCast;

class ArticleAuthor implements LineInterface
{
    const CODE = 'LA';

    /**
     * @var string
     */
    private $articleId;

    /**
     * @var string
     */
    private $authorId;

    /**
     * @var AuthorType
     */
    private $authorType;

    /**
     * @var int
     */
    private $position;

    /**
     * ArticleAuthor constructor.
     * @param string $articleId
     * @param string $authorId
     * @param AuthorType $authorType
     * @param int $position
     */
    public function __construct($articleId, $authorId, AuthorType $authorType, $position)
    {
        $this->articleId = $articleId;
        $this->authorId = $authorId;
        $this->authorType = $authorType;
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function articleId()
    {
        return $this->articleId;
    }

    /**
     * @return string
     */
    public function authorId()
    {
        return $this->authorId;
    }

    /**
     * @return AuthorType
     */
    public function authorType()
    {
        return $this->authorType;
    }

    /**
     * @return int
     */
    public function position()
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public static function getCode()
    {
        return self::CODE;
    }

    /**
     * @return string
     */
    public function toLine()
    {
        return self::CODE.GeslibFile::FIELD_SEPARATOR;
    }

    /**
     * @param array $line
     * @return self
     */
    public static function fromLine($line)
    {
        return new self(
            TypeCast::string($line[1]),
            TypeCast::string($line[2]),
            AuthorType::fromCode($line[3]),
            TypeCast::integer($line[4])
        );
    }
}
