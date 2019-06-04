<?php

namespace NumaxLab\Geslib\Lines;

use Carbon\Carbon;
use NumaxLab\Geslib\GeslibFile;
use Stringy\Stringy;

class Article implements LineInterface
{
    const CODE = 'GP4';

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
     * Article constructor.
     * @param Action $action
     * @param $id
     * @param null $title
     * @param array $authors
     * @param null $isbn
     * @param null $ean
     * @param null $pagesQty
     * @param null $edition
     * @param null $firstEditionYear
     * @param null $lastEditionYear
     * @param null $location
     * @param null $stock
     * @param null $topicId
     * @param null $createdAt
     * @param null $noveltyDate
     * @param null $languageId
     * @param null $formatId
     * @param null $translator
     * @param null $illustrator
     * @param null $collectionId
     * @param null $collectionNumber
     * @param null $subtitle
     * @param null $statusId
     * @param null $tmr
     * @param null $retailPrice
     * @param null $typeId
     * @param null $classificationId
     * @param null $editorialId
     * @param null $priceWithoutTaxes
     * @param null $illustrationsQty
     * @param null $weight
     * @param null $height
     * @param null $appearanceDate
     * @param null $description
     * @param null $altLocation
     * @param null $taxes
     * @param null $cdu
     * @param null $originalLanguageId
     * @param null $originalTitle
     */
    private function __construct(
        Action $action,
        $id,
        $title = null,
        $authors = [],
        $isbn = null,
        $ean = null,
        $pagesQty = null,
        $edition = null,
        $firstEditionYear = null,
        $lastEditionYear = null,
        $location = null,
        $stock = null,
        $topicId = null,
        $createdAt = null,
        $noveltyDate = null,
        $languageId = null,
        $formatId = null,
        $translator = null,
        $illustrator = null,
        $collectionId = null,
        $collectionNumber = null,
        $subtitle = null,
        $statusId = null,
        $tmr = null,
        $retailPrice = null,
        $typeId = null,
        $classificationId = null,
        $editorialId = null,
        $priceWithoutTaxes = null,
        $illustrationsQty = null,
        $weight = null,
        $height = null,
        $appearanceDate = null,
        $description = null,
        $altLocation = null,
        $taxes = null,
        $cdu = null,
        $originalLanguageId = null,
        $originalTitle = null
    ) {
        $this->action = $action;
        $this->id = $id;
        $this->title = $title;
    }

    /**
     * @param string $id
     * @return Article
     */
    public static function createWithDeleteAction($id)
    {
        return new self(Action::fromCode(Action::DELETE), $id);
    }

    /**
     * @param Action $action
     * @param $id
     * @param $title
     * @param $authors
     * @return Article
     */
    public static function createWithAction(Action $action, $id, $title, $authors)
    {
        return new self($action, $id, $title, $authors);
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
        $action = Action::fromCode($line[1]);

        if ($action->isDelete()) {
            return self::createWithDeleteAction($line[1]);
        }

        $authors = [];
        $line4 = Stringy::create($line[4]);

        if (! empty($line4->trim())) {
            foreach (explode(';', $line4) as $lineAuthor) {
                $authors[] = Stringy::create($lineAuthor)->trim();
            }
        }

        return self::createWithAction(
            $action,
            $line[2],
            $line[3],
            $authors
        );
    }
}
