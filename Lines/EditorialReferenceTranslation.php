<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\GeslibFile;
use NumaxLab\Geslib\TypeCast;

class EditorialReferenceTranslation implements LineInterface
{
    const CODE = '6TE';

    /**
     * @var string
     */
    private $articleId;

    /**
     * @var string
     */
    private $languageId;

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
     * @param string $languageId
     * @param int $count
     * @param string $value
     */
    public function __construct($articleId, $languageId, $count, $value)
    {
        $this->articleId = $articleId;
        $this->languageId = $languageId;
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
    public function languageId()
    {
        return $this->languageId;
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
            TypeCast::integer($line[3]),
            TypeCast::string($line[4])
        );
    }
}
