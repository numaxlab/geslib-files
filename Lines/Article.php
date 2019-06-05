<?php

namespace NumaxLab\Geslib\Lines;

use Carbon\Carbon;
use NumaxLab\Geslib\GeslibFile;
use NumaxLab\Geslib\TypeCast;
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
     * @var string|null
     */
    private $title;

    /**
     * @var array|null
     */
    private $authors;

    /**
     * @var string|null
     */
    private $isbn;

    /**
     * @var string|null
     */
    private $ean;

    /**
     * @var int|null
     */
    private $pagesQty;

    /**
     * @var Edition|null
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
     * @var int|null
     */
    private $stock;

    /**
     * @var string|null
     */
    private $topicId;

    /**
     * @var Carbon|null
     */
    private $createdAt;

    /**
     * @var Carbon|null
     */
    private $noveltyDate;

    /**
     * @var string|null
     */
    private $languageId;

    /**
     * @var string|null
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
     * @var string|null
     */
    private $collectionId;

    /**
     * @var string|null
     */
    private $collectionNumber;

    /**
     * @var string|null
     */
    private $subtitle;

    /**
     * @var string|null
     */
    private $statusId;

    /**
     * @var int|null
     */
    private $tmr;

    /**
     * @var int|null
     */
    private $retailPrice;

    /**
     * @var string|null
     */
    private $typeId;

    /**
     * @var string|null
     */
    private $classificationId;

    /**
     * @var string|null
     */
    private $editorialId;

    /**
     * @var int|null
     */
    private $priceWithoutTaxes;

    /**
     * @var int|null
     */
    private $illustrationsQty;

    /**
     * @var int|null
     */
    private $weight;

    /**
     * @var int|null
     */
    private $width;

    /**
     * @var int|null
     */
    private $height;

    /**
     * @var Carbon|null
     */
    private $appearanceDate;

    /**
     * @var string|null
     */
    private $externalDescription;

    /**
     * @var string|null
     */
    private $tags;

    /**
     * @var string|null
     */
    private $altLocation;

    /**
     * @var int|null
     */
    private $taxes;

    /**
     * @var string|null
     */
    private $rating;

    /**
     * @var string|null
     */
    private $literaryQuality;

    /**
     * @var int|null
     */
    private $referencePrice;

    /**
     * @var string|null
     */
    private $cdu;

    /**
     * @var string|null
     */
    private $freeField1;

    /**
     * @var string|null
     */
    private $freeField2;

    /**
     * @var bool|null
     */
    private $wasAwarded;

    /**
     * @var bool|null
     */
    private $isPod;

    /**
     * @var string|null
     */
    private $podDistributor;

    /**
     * @var string|null
     */
    private $oldCode;

    /**
     * @var string|null
     */
    private $size;

    /**
     * @var string|null
     */
    private $color;

    /**
     * @var string|null
     */
    private $originalLanguageId;

    /**
     * @var string|null
     */
    private $originalTitle;

    /**
     * Article constructor.
     * @param Action $action
     * @param string $id
     * @param null|string $title
     * @param array $authors
     * @param null|string $isbn
     * @param null|string $ean
     * @param null|int $pagesQty
     * @param null|Edition $edition
     * @param null|int $firstEditionYear
     * @param null|int $lastEditionYear
     * @param null|string $location
     * @param null|int $stock
     * @param null|string $topicId
     * @param null|Carbon $createdAt
     * @param null|Carbon $noveltyDate
     * @param null|string $languageId
     * @param null|string $formatId
     * @param null|string $translator
     * @param null|string $illustrator
     * @param null|string $collectionId
     * @param null|string $collectionNumber
     * @param null|string $subtitle
     * @param null|string $statusId
     * @param null|int $tmr
     * @param null|int $retailPrice
     * @param null|string $typeId
     * @param null|string $classificationId
     * @param null|string $editorialId
     * @param null|string $priceWithoutTaxes
     * @param null|int $illustrationsQty
     * @param null|int $weight
     * @param null|int $width
     * @param null|int $height
     * @param null|Carbon $appearanceDate
     * @param null|string $externalDescription
     * @param null|string $tags
     * @param null|string $altLocation
     * @param null|int $taxes
     * @param null|string $rating
     * @param null|string $literaryQuality
     * @param null|int $referencePrice
     * @param null|string $cdu
     * @param null|string $freeField1
     * @param null|string $freeField2
     * @param null|bool $wasAwarded
     * @param null|bool $isPod
     * @param null|string $podDistributor
     * @param null|string $oldCode
     * @param null|string $size
     * @param null|string $color
     * @param null|string $originalLanguageId
     * @param null|string $originalTitle
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
        $width = null,
        $height = null,
        $appearanceDate = null,
        $externalDescription = null,
        $tags = null,
        $altLocation = null,
        $taxes = null,
        $rating = null,
        $literaryQuality = null,
        $referencePrice = null,
        $cdu = null,
        $freeField1 = null,
        $freeField2 = null,
        $wasAwarded = null,
        $isPod = null,
        $podDistributor = null,
        $oldCode = null,
        $size = null,
        $color = null,
        $originalLanguageId = null,
        $originalTitle = null
    ) {
        $this->action = $action;
        $this->id = $id;
        $this->title = $title;
        $this->authors = $authors;
        $this->isbn = $isbn;
        $this->ean = $ean;
        $this->pagesQty = $pagesQty;
        $this->edition = $edition;
        $this->firstEditionYear = $firstEditionYear;
        $this->lastEditionYear = $lastEditionYear;
        $this->location = $location;
        $this->stock = $stock;
        $this->topicId = $topicId;
        $this->createdAt = $createdAt;
        $this->noveltyDate = $noveltyDate;
        $this->languageId = $languageId;
        $this->formatId = $formatId;
        $this->translator = $translator;
        $this->illustrator = $illustrator;
        $this->collectionId = $collectionId;
        $this->collectionNumber = $collectionNumber;
        $this->subtitle = $subtitle;
        $this->statusId = $statusId;
        $this->tmr = $tmr;
        $this->retailPrice = $retailPrice;
        $this->typeId = $typeId;
        $this->classificationId = $classificationId;
        $this->editorialId = $editorialId;
        $this->priceWithoutTaxes = $priceWithoutTaxes;
        $this->illustrationsQty = $illustrationsQty;
        $this->weight = $weight;
        $this->width = $width;
        $this->height = $height;
        $this->appearanceDate = $appearanceDate;
        $this->externalDescription = $externalDescription;
        $this->tags = $tags;
        $this->altLocation = $altLocation;
        $this->taxes = $taxes;
        $this->rating = $rating;
        $this->literaryQuality = $literaryQuality;
        $this->referencePrice = $referencePrice;
        $this->cdu = $cdu;
        $this->freeField1 = $freeField1;
        $this->freeField2 = $freeField2;
        $this->wasAwarded = $wasAwarded;
        $this->isPod = $isPod;
        $this->podDistributor = $podDistributor;
        $this->oldCode = $oldCode;
        $this->size = $size;
        $this->color = $color;
        $this->originalLanguageId = $originalLanguageId;
        $this->originalTitle = $originalTitle;
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
     * @param string $id
     * @param string $title
     * @param array $authors
     * @param string|null $isbn
     * @param string|null $ean
     * @param int|null $pagesQty
     * @param Edition|null $edition
     * @param int|null $firstEditionYear
     * @param int|null $lastEditionYear
     * @param string|null $location
     * @param int|null $stock
     * @param string|null $topicId
     * @param Carbon|null $createdAt
     * @param Carbon|null $noveltyDate
     * @param string|null $languageId
     * @param string|null $formatId
     * @param string|null $translator
     * @param string|null $illustrator
     * @param string|null $collectionId
     * @param string|null $collectionNumber
     * @param string|null $subtitle
     * @param string|null $statusId
     * @param int|null $tmr
     * @param int|null $retailPrice
     * @param string|null $typeId
     * @param string|null $classificationId
     * @param string|null $editorialId
     * @param int|null $priceWithoutTaxes
     * @param int|null $illustrationsQty
     * @param int|null $weight
     * @param int|null $width
     * @param int|null $height
     * @param Carbon|null $appearanceDate
     * @param string|null $externalDescription
     * @param string|null $tags
     * @param string|null $altLocation
     * @param int|null $taxes
     * @param string|null $rating
     * @param string|null $literaryQuality
     * @param int|null $referencePrice
     * @param string|null $cdu
     * @param string|null $freeField1
     * @param string|null $freeField2
     * @param bool|null $wasAwarded
     * @param bool|null $isPod
     * @param string|null $podDistributor
     * @param string|null $oldCode
     * @param string|null $size
     * @param string|null $color
     * @param string|null $originalLanguageId
     * @param string|null $originalTitle
     * @return Article
     */
    public static function createWithAction(
        Action $action,
        $id,
        $title,
        $authors,
        $isbn,
        $ean,
        $pagesQty,
        $edition,
        $firstEditionYear,
        $lastEditionYear,
        $location,
        $stock,
        $topicId,
        $createdAt,
        $noveltyDate,
        $languageId,
        $formatId,
        $translator,
        $illustrator,
        $collectionId,
        $collectionNumber,
        $subtitle,
        $statusId,
        $tmr,
        $retailPrice,
        $typeId,
        $classificationId,
        $editorialId,
        $priceWithoutTaxes,
        $illustrationsQty,
        $weight,
        $width,
        $height,
        $appearanceDate,
        $externalDescription,
        $tags,
        $altLocation,
        $taxes,
        $rating,
        $literaryQuality,
        $referencePrice,
        $cdu,
        $freeField1,
        $freeField2,
        $wasAwarded,
        $isPod,
        $podDistributor,
        $oldCode,
        $size,
        $color,
        $originalLanguageId,
        $originalTitle
    ) {
        return new self(
            $action,
            $id,
            $title,
            $authors,
            $isbn,
            $ean,
            $pagesQty,
            $edition,
            $firstEditionYear,
            $lastEditionYear,
            $location,
            $stock,
            $topicId,
            $createdAt,
            $noveltyDate,
            $languageId,
            $formatId,
            $translator,
            $illustrator,
            $collectionId,
            $collectionNumber,
            $subtitle,
            $statusId,
            $tmr,
            $retailPrice,
            $typeId,
            $classificationId,
            $editorialId,
            $priceWithoutTaxes,
            $illustrationsQty,
            $weight,
            $width,
            $height,
            $appearanceDate,
            $externalDescription,
            $tags,
            $altLocation,
            $taxes,
            $rating,
            $literaryQuality,
            $referencePrice,
            $cdu,
            $freeField1,
            $freeField2,
            $wasAwarded,
            $isPod,
            $podDistributor,
            $oldCode,
            $size,
            $color,
            $originalLanguageId,
            $originalTitle
        );
    }

    /**
     * @return Action
     */
    public function action()
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return array
     */
    public function authors()
    {
        return $this->authors;
    }

    /**
     * @return string
     */
    public function isbn()
    {
        return $this->isbn;
    }

    /**
     * @return null|string
     */
    public function ean()
    {
        return $this->ean;
    }

    /**
     * @return int
     */
    public function pagesQty()
    {
        return $this->pagesQty;
    }

    /**
     * @return Edition
     */
    public function edition()
    {
        return $this->edition;
    }

    /**
     * @return int|null
     */
    public function firstEditionYear()
    {
        return $this->firstEditionYear;
    }

    /**
     * @return int|null
     */
    public function lastEditionYear()
    {
        return $this->lastEditionYear;
    }

    /**
     * @return null|string
     */
    public function location()
    {
        return $this->location;
    }

    /**
     * @return int
     */
    public function stock()
    {
        return $this->stock;
    }

    /**
     * @return null|string
     */
    public function topicId()
    {
        return $this->topicId;
    }

    /**
     * @return Carbon|null
     */
    public function createdAt()
    {
        return $this->createdAt;
    }

    /**
     * @return Carbon|null
     */
    public function noveltyDate()
    {
        return $this->noveltyDate;
    }

    /**
     * @return string|null
     */
    public function languageId()
    {
        return $this->languageId;
    }

    /**
     * @return string|null
     */
    public function formatId()
    {
        return $this->formatId;
    }

    /**
     * @return null|string
     */
    public function translator()
    {
        return $this->translator;
    }

    /**
     * @return null|string
     */
    public function illustrator()
    {
        return $this->illustrator;
    }

    /**
     * @return null|string
     */
    public function collectionId()
    {
        return $this->collectionId;
    }

    /**
     * @return null|string
     */
    public function collectionNumber()
    {
        return $this->collectionNumber;
    }

    /**
     * @return null|string
     */
    public function subtitle()
    {
        return $this->subtitle;
    }

    /**
     * @return null|string
     */
    public function statusId()
    {
        return $this->statusId;
    }

    /**
     * @return null|string
     */
    public function tmr()
    {
        return $this->tmr;
    }

    /**
     * @return int|null
     */
    public function retailPrice()
    {
        return $this->retailPrice;
    }

    /**
     * @return null|string
     */
    public function typeId()
    {
        return $this->typeId;
    }

    /**
     * @return null|string
     */
    public function classificationId()
    {
        return $this->classificationId;
    }

    /**
     * @return null|string
     */
    public function editorialId()
    {
        return $this->editorialId;
    }

    /**
     * @return int|null
     */
    public function priceWithoutTaxes()
    {
        return $this->priceWithoutTaxes;
    }

    /**
     * @return int|null
     */
    public function illustrationsQty()
    {
        return $this->illustrationsQty;
    }

    /**
     * @return int|null
     */
    public function weight()
    {
        return $this->weight;
    }

    /**
     * @return int|null
     */
    public function width()
    {
        return $this->width;
    }

    /**
     * @return int|null
     */
    public function height()
    {
        return $this->height;
    }

    /**
     * @return Carbon|null
     */
    public function appearanceDate()
    {
        return $this->appearanceDate;
    }

    /**
     * @return null|string
     */
    public function externalDescription()
    {
        return $this->externalDescription;
    }

    /**
     * @return null|string
     */
    public function tags()
    {
        return $this->tags;
    }

    /**
     * @return null|string
     */
    public function altLocation()
    {
        return $this->altLocation;
    }

    /**
     * @return int|null
     */
    public function taxes()
    {
        return $this->taxes;
    }

    /**
     * @return null|string
     */
    public function rating()
    {
        return $this->rating;
    }

    /**
     * @return null|string
     */
    public function literaryQuality()
    {
        return $this->literaryQuality;
    }

    /**
     * @return int|null
     */
    public function referencePrice()
    {
        return $this->referencePrice;
    }

    /**
     * @return null|string
     */
    public function cdu()
    {
        return $this->cdu;
    }

    /**
     * @return null|string
     */
    public function freeField1()
    {
        return $this->freeField1;
    }

    /**
     * @return null|string
     */
    public function freeField2()
    {
        return $this->freeField2;
    }

    /**
     * @return bool|null
     */
    public function wasAwarded()
    {
        return $this->wasAwarded;
    }

    /**
     * @return bool|null
     */
    public function isPod()
    {
        return $this->isPod;
    }

    /**
     * @return null|string
     */
    public function podDistributor()
    {
        return $this->podDistributor;
    }

    /**
     * @return null|string
     */
    public function oldCode()
    {
        return $this->oldCode;
    }

    /**
     * @return null|string
     */
    public function size()
    {
        return $this->size;
    }

    /**
     * @return null|string
     */
    public function color()
    {
        return $this->color;
    }

    /**
     * @return null|string
     */
    public function originalLanguageId()
    {
        return $this->originalLanguageId;
    }

    /**
     * @return null|string
     */
    public function originalTitle()
    {
        return $this->originalTitle;
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

        $id = TypeCast::string($line[2]);

        if ($action->isDelete()) {
            return self::createWithDeleteAction($id);
        }

        $authors = [];
        $line4 = Stringy::create($line[4]);

        if (! empty($line4->trim())) {
            foreach (explode(';', $line4) as $lineAuthor) {
                $authors[] = Stringy::create($lineAuthor)->trim();
            }
        }

        $edition = null;
        $line9 = Stringy::create($line[9]);

        if (! empty($line9->trim())) {
            $edition = new Edition(
                $line9->trim(),
                TypeCast::string($line[10]),
                TypeCast::carbon($line[11]),
                TypeCast::carbon($line[12])
            );
        }

        return self::createWithAction(
            $action,
            $id,
            TypeCast::string($line[3]),
            $authors,
            TypeCast::string($line[6]),
            TypeCast::string($line[7]),
            TypeCast::integer($line[8]),
            $edition,
            TypeCast::integer($line[13]),
            TypeCast::integer($line[14]),
            TypeCast::string($line[15]),
            TypeCast::integer($line[16]),
            TypeCast::string($line[17]),
            TypeCast::carbon($line[18]),
            TypeCast::carbon($line[19]),
            TypeCast::string($line[20]),
            TypeCast::string($line[21]),
            TypeCast::string($line[22]),
            TypeCast::string($line[23]),
            TypeCast::string($line[24]),
            TypeCast::string($line[25]),
            TypeCast::string($line[26]),
            TypeCast::string($line[27]),
            TypeCast::integerMoney($line[28]),
            TypeCast::integerMoney($line[29]),
            TypeCast::string($line[30]),
            TypeCast::string($line[31]),
            TypeCast::string($line[32]),
            TypeCast::integerMoney($line[33]),
            TypeCast::integer($line[34]),
            TypeCast::integer($line[35]),
            TypeCast::integer($line[36]),
            TypeCast::integer($line[37]),
            TypeCast::carbon($line[38]),
            TypeCast::string($line[39]),
            TypeCast::string($line[40]),
            TypeCast::string($line[41]),
            TypeCast::integerMoney($line[42]),
            TypeCast::string($line[43]),
            TypeCast::string($line[44]),
            TypeCast::integerMoney($line[45]),
            TypeCast::string($line[46]),
            TypeCast::string($line[48]),
            TypeCast::string($line[49]),
             TypeCast::boolean($line[50]),
            TypeCast::boolean($line[51]),
            TypeCast::string($line[52]),
            TypeCast::string($line[53]),
            TypeCast::string($line[54]),
            TypeCast::string($line[55]),
            TypeCast::string($line[56]),
            TypeCast::string($line[57])
        );
    }
}
