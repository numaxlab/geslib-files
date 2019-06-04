<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\GeslibFile;

class ArticleTopic implements LineInterface
{
    const CODE = '5';

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
            $line[1],
            $line[2]
        );
    }
}
