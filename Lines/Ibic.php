<?php

namespace NumaxLab\Geslib\Lines;

class Ibic implements LineInterface
{
    /**
     * @var string
     */
    private $articleId;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $description;

    /**
     * Ibic constructor.
     * @param $articleId
     * @param $code
     * @param $description
     */
    public function __construct($articleId, $code, $description)
    {
        $this->articleId = $articleId;
        $this->code = $code;
        $this->description = $description;
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
    public function code()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function description()
    {
        return $this->description;
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
            $line[3]
        );
    }
}
