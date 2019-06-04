<?php

namespace NumaxLab\Geslib\Lines;

class ArticleTopic implements LineInterface
{
    /**
     * @var string
     */
    private $topicId;

    /**
     * @var string
     */
    private $articleId;

    /**
     * ArticleTopic constructor.
     * @param string $topicId
     * @param string $articleId
     */
    public function __construct($topicId, $articleId)
    {
        $this->topicId = $topicId;
        $this->articleId = $articleId;
    }

    /**
     * @return string
     */
    public function topicId()
    {
        return $this->topicId;
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
            $line[2]
        );
    }
}
