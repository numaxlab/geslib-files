<?php

namespace NumaxLab\Geslib\Lines;

use Carbon\Carbon;
use NumaxLab\Geslib\TypeCast;

class Article implements LineInterface
{
    const CODE = 'GP4';

    private readonly Action $action;
    private readonly string $id;
    private readonly ?string $title;
    private readonly ?array $authors;
    private readonly ?string $isbn;
    private readonly ?string $ean;
    private readonly ?int $pagesQty;
    private readonly ?Edition $edition;
    private readonly ?int $firstEditionYear;
    private readonly ?int $lastEditionYear;
    private readonly ?string $location;
    private readonly ?int $stock;
    private readonly ?string $topicId;
    private readonly ?Carbon $createdAt;
    private readonly ?Carbon $noveltyDate;
    private readonly ?string $languageId;
    private readonly ?string $formatId;
    private readonly ?string $translator;
    private readonly ?string $illustrator;
    private readonly ?string $collectionId;
    private readonly ?string $collectionNumber;
    private readonly ?string $subtitle;
    private readonly ?string $statusId;
    private readonly ?int $tmr;
    private readonly ?int $retailPrice;
    private readonly ?string $typeId;
    private readonly ?string $classificationId;
    private readonly ?string $editorialId;
    private readonly ?int $priceWithoutTaxes;
    private readonly ?int $illustrationsQty;
    private readonly ?int $weight;
    private readonly ?int $width;
    private readonly ?int $height;
    private readonly ?Carbon $appearanceDate;
    private readonly ?string $externalDescription;
    private readonly ?string $tags;
    private readonly ?string $altLocation;
    private readonly ?int $taxes;
    private readonly ?string $rating;
    private readonly ?string $literaryQuality;
    private readonly ?int $referencePrice;
    private readonly ?string $cdu;
    private readonly ?string $freeField1;
    private readonly ?string $freeField2;
    private readonly ?bool $wasAwarded;
    private readonly ?bool $isPod;
    private readonly ?string $podDistributor;
    private readonly ?string $oldCode;
    private readonly ?string $size;
    private readonly ?string $color;
    private readonly ?string $originalLanguageId;
    private readonly ?string $originalTitle;

    private function __construct(
        Action $action,
        string $id,
        string $title = null,
        array $authors = [],
        string $isbn = null,
        string $ean = null,
        int $pagesQty = null,
        Edition $edition = null,
        int $firstEditionYear = null,
        int $lastEditionYear = null,
        string $location = null,
        int $stock = null,
        string $topicId = null,
        Carbon $createdAt = null,
        Carbon $noveltyDate = null,
        string $languageId = null,
        string $formatId = null,
        string $translator = null,
        string $illustrator = null,
        string $collectionId = null,
        string $collectionNumber = null,
        string $subtitle = null,
        string $statusId = null,
        int $tmr = null,
        int $retailPrice = null,
        string $typeId = null,
        string $classificationId = null,
        string $editorialId = null,
        string $priceWithoutTaxes = null,
        int $illustrationsQty = null,
        int $weight = null,
        int $width = null,
        int $height = null,
        Carbon $appearanceDate = null,
        string $externalDescription = null,
        string $tags = null,
        string $altLocation = null,
        int $taxes = null,
        string $rating = null,
        string $literaryQuality = null,
        int $referencePrice = null,
        string $cdu = null,
        string $freeField1 = null,
        string $freeField2 = null,
        bool $wasAwarded = null,
        bool $isPod = null,
        string $podDistributor = null,
        string $oldCode = null,
        string $size = null,
        string $color = null,
        string $originalLanguageId = null,
        string $originalTitle = null,
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

    public static function getCode(): string
    {
        return self::CODE;
    }

    public static function fromLine($line): self
    {
        $action = Action::fromCode($line[1]);

        $id = TypeCast::string($line[2]);

        if ($action->isDelete()) {
            return self::createWithDeleteAction($id);
        }

        $authors = [];
        $line4 = trim($line[4]);

        if ($line4 !== '') {
            foreach (explode(';', $line4) as $lineAuthor) {
                $authors[] = trim($lineAuthor);
            }
        }

        $edition = null;
        $line9 = trim($line[9]);

        if ($line9 !== '') {
            $edition = new Edition(
                $line9,
                TypeCast::string($line[10]),
                TypeCast::carbon($line[11]),
                TypeCast::carbon($line[12]),
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
            TypeCast::string($line[57]),
        );
    }

    public static function createWithDeleteAction($id): self
    {
        return new self(Action::fromCode(Action::DELETE), $id);
    }

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
        $originalTitle,
    ): self {
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
            $originalTitle,
        );
    }

    public function action(): Action
    {
        return $this->action;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function title(): ?string
    {
        return $this->title;
    }

    public function authors(): ?array
    {
        return $this->authors;
    }

    public function isbn(): ?string
    {
        return $this->isbn;
    }

    public function ean(): ?string
    {
        return $this->ean;
    }

    public function pagesQty(): ?int
    {
        return $this->pagesQty;
    }

    public function edition(): ?Edition
    {
        return $this->edition;
    }

    public function firstEditionYear(): ?int
    {
        return $this->firstEditionYear;
    }

    public function lastEditionYear(): ?int
    {
        return $this->lastEditionYear;
    }

    public function location(): ?string
    {
        return $this->location;
    }

    public function stock(): ?int
    {
        return $this->stock;
    }

    public function topicId(): ?string
    {
        return $this->topicId;
    }

    public function createdAt(): ?Carbon
    {
        return $this->createdAt;
    }

    public function noveltyDate(): ?Carbon
    {
        return $this->noveltyDate;
    }

    public function languageId(): ?string
    {
        return $this->languageId;
    }

    public function formatId(): ?string
    {
        return $this->formatId;
    }

    public function translator(): ?string
    {
        return $this->translator;
    }

    public function illustrator(): ?string
    {
        return $this->illustrator;
    }

    public function collectionId(): ?string
    {
        return $this->collectionId;
    }

    public function collectionNumber(): ?string
    {
        return $this->collectionNumber;
    }

    public function subtitle(): ?string
    {
        return $this->subtitle;
    }

    public function statusId(): ?string
    {
        return $this->statusId;
    }

    public function tmr(): ?string
    {
        return $this->tmr;
    }

    public function retailPrice(): ?int
    {
        return $this->retailPrice;
    }

    public function typeId(): ?string
    {
        return $this->typeId;
    }

    public function classificationId(): ?string
    {
        return $this->classificationId;
    }

    public function editorialId(): ?string
    {
        return $this->editorialId;
    }

    public function priceWithoutTaxes(): ?int
    {
        return $this->priceWithoutTaxes;
    }

    public function illustrationsQty(): ?int
    {
        return $this->illustrationsQty;
    }

    public function weight(): ?int
    {
        return $this->weight;
    }

    public function width(): ?int
    {
        return $this->width;
    }

    public function height(): ?int
    {
        return $this->height;
    }

    public function appearanceDate(): ?Carbon
    {
        return $this->appearanceDate;
    }

    public function externalDescription(): ?string
    {
        return $this->externalDescription;
    }

    public function tags(): ?string
    {
        return $this->tags;
    }

    public function altLocation(): ?string
    {
        return $this->altLocation;
    }

    public function taxes(): ?int
    {
        return $this->taxes;
    }

    public function rating(): ?string
    {
        return $this->rating;
    }

    public function literaryQuality(): ?string
    {
        return $this->literaryQuality;
    }

    public function referencePrice(): ?int
    {
        return $this->referencePrice;
    }

    public function cdu(): ?string
    {
        return $this->cdu;
    }

    public function freeField1(): ?string
    {
        return $this->freeField1;
    }

    public function freeField2(): ?string
    {
        return $this->freeField2;
    }

    public function wasAwarded(): ?bool
    {
        return $this->wasAwarded;
    }

    public function isPod(): ?bool
    {
        return $this->isPod;
    }

    public function podDistributor(): ?string
    {
        return $this->podDistributor;
    }

    public function oldCode(): ?string
    {
        return $this->oldCode;
    }

    public function size(): ?string
    {
        return $this->size;
    }

    public function color(): ?string
    {
        return $this->color;
    }

    public function originalLanguageId(): ?string
    {
        return $this->originalLanguageId;
    }

    public function originalTitle(): ?string
    {
        return $this->originalTitle;
    }
}
