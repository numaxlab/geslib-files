<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\GeslibFile;

class AuthorBiography implements LineInterface
{
    const CODE = 'AUTBIO';

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
