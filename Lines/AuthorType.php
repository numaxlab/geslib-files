<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\Exceptions\InvalidAuthorTypeException;

class AuthorType
{
    const AUTHOR = 'A';
    const ILLUSTRATOR = 'I';
    const BACK_COVER_ILLUSTRATOR = 'IC';
    const COVER_ILLUSTRATOR = 'IP';
    const TRANSLATOR = 'T';

    /**
     * @var string
     */
    private $code;

    /**
     * Action constructor.
     * @param string $code
     */
    private function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * @param string $code
     * @return AuthorType
     */
    public static function fromCode($code)
    {
        if ($code === self::AUTHOR) {
            return new self(self::AUTHOR);
        }

        if ($code === self::ILLUSTRATOR) {
            return new self(self::ILLUSTRATOR);
        }

        if ($code === self::BACK_COVER_ILLUSTRATOR) {
            return new self(self::BACK_COVER_ILLUSTRATOR);
        }

        if ($code === self::COVER_ILLUSTRATOR) {
            return new self(self::COVER_ILLUSTRATOR);
        }

        if ($code === self::TRANSLATOR) {
            return new self(self::TRANSLATOR);
        }

        throw new InvalidAuthorTypeException(sprintf('Invalid author type with code %s', $code));
    }

    /**
     * @return string
     */
    public function code()
    {
        return $this->code;
    }
}
