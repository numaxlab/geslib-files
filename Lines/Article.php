<?php

namespace NumaxLab\Geslib\Lines;

use Carbon\Carbon;

class Article implements LineInterface
{
    /**
     * @var Action
     */
    private $action;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var array
     */
    private $authors;

    /**
     * @var string
     */
    private $isbn;

    /**
     * @var string|null
     */
    private $ean;

    /**
     * @var int
     */
    private $pagesQty;

    /**
     * @var Edition
     */
    private $edition;

    /**
     * @var int|null
     */
    private $firstEditionYear;

    /**
     * @var int|null
     */
    private $lastEditionYear;

    /**
     * @var string|null
     */
    private $location;

    /**
     * @var int
     */
    private $stock;

    /**
     * @var string|null
     */
    private $topicId;

    /**
     * @var Carbon
     */
    private $createdAt;

    /**
     * @var Carbon
     */
    private $noveltyDate;

    /**
     * @var string
     */
    private $languageId;

    /**
     * @var string
     */
    private $formatId;

    /**
     * @var string|null
     */
    private $translator;

    /**
     * @var string|null
     */
    private $illustrator;

    /**
     * @var string
     */
    private $collectionId;

    /**
     * @var string
     */
    private $collectionNumber;

    /**
     * @var string|null
     */
    private $subtitle;

    /**
     * @var string
     */
    private $statusId;

    /**
     * @var string
     */
    private $tmr;

    /**
     * @var int
     */
    private $retailPrice;

    /**
     * @var string
     */
    private $typeId;

    /**
     * @var string
     */
    private $classificationId;

    /**
     * @var string
     */
    private $editorialId;

    /**
     * @var int
     */
    private $priceWithoutTaxes;

    /**
     * @var int
     */
    private $illustrationsQty;

    /**
     * @var int
     */
    private $weight;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var Carbon
     */
    private $appearanceDate;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $altLocation;

    /**
     * @var int
     */
    private $taxes;

    /**
     * @var string
     */
    private $cdu;

    /**
     * @var string
     */
    private $originalLanguageId;

    /**
     * @var string
     */
    private $originalTitle;

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
        return new self();
    }
}
