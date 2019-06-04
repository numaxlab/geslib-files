<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\GeslibFile;

class EbookInfo implements LineInterface
{
    const CODE = 'IEB';

    private $articleId;

    private $providerReference;

    private $trevenqueReference;

    private $size;

    private $license;

    private $url;

    private $downloadsQty;

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
        // TODO: Implement fromLine() method.
    }
}
