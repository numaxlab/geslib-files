<?php

namespace NumaxLab\Geslib\Lines;

class AuthorBiography implements LineInterface
{
    /**
     * @var string
     */
    private $authorId;

    /**
     * @var string
     */
    private $biography;

    /**
     * AuthorBiography constructor.
     * @param string $authorId
     * @param string $biography
     */
    public function __construct($authorId, $biography)
    {
        $this->authorId = $authorId;
        $this->biography = $biography;
    }

    /**
     * @return string
     */
    public function authorId()
    {
        return $this->authorId;
    }

    /**
     * @return string
     */
    public function biography()
    {
        return $this->biography;
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
