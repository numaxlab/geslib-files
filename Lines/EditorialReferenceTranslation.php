<?php

namespace NumaxLab\Geslib\Lines;

class EditorialReferenceTranslation implements LineInterface
{
    /**
     * @var string
     */
    private $articleId;

    /**
     * @var string
     */
    private $language;

    /**
     * @var int
     */
    private $count;

    /**
     * @var string
     */
    private $value;

    /**
     * EditorialReferenceTranslation constructor.
     * @param string $articleId
     * @param string $language
     * @param int $count
     * @param string $value
     */
    public function __construct($articleId, $language, $count, $value)
    {
        $this->articleId = $articleId;
        $this->language = $language;
        $this->count = $count;
        $this->value = $value;
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
    public function language()
    {
        return $this->language;
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->count;
    }

    /**
     * @return string
     */
    public function value()
    {
        return $this->value;
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
            $line[3],
            $line[4]
        );
    }
}
