<?php

namespace NumaxLab\Geslib\Lines;

class ArticleAuthor implements LineInterface
{
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
    public function toLine()
    {
        // TODO: Implement toLine() method.
    }

    /**
     * @param array $line
     * @return self
     */
    public static function fromLine($line)
    {
        return new self(
            $line[1],
            $line[2],
            AuthorType::fromCode($line[3]),
            $line[4]
        );
    }
}
