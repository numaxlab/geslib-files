<?php

namespace NumaxLab\Geslib;

use NumaxLab\Geslib\Exceptions\InvalidLineCodeException;
use NumaxLab\Geslib\Exceptions\NotImplementedLineCodeException;
use NumaxLab\Geslib\Lines\Article;
use NumaxLab\Geslib\Lines\ArticleAuthor;
use NumaxLab\Geslib\Lines\ArticleBatchHeader;
use NumaxLab\Geslib\Lines\ArticleBatchLine;
use NumaxLab\Geslib\Lines\ArticleIndex;
use NumaxLab\Geslib\Lines\ArticleIndexTranslation;
use NumaxLab\Geslib\Lines\ArticleTopic;
use NumaxLab\Geslib\Lines\Author;
use NumaxLab\Geslib\Lines\AuthorBiography;
use NumaxLab\Geslib\Lines\BindingType;
use NumaxLab\Geslib\Lines\BookshopReference;
use NumaxLab\Geslib\Lines\BookshopReferenceTranslation;
use NumaxLab\Geslib\Lines\Classification;
use NumaxLab\Geslib\Lines\Collection;
use NumaxLab\Geslib\Lines\Country;
use NumaxLab\Geslib\Lines\EBook;
use NumaxLab\Geslib\Lines\EbookInfo;
use NumaxLab\Geslib\Lines\Editorial;
use NumaxLab\Geslib\Lines\EditorialReference;
use NumaxLab\Geslib\Lines\EditorialReferenceTranslation;
use NumaxLab\Geslib\Lines\Ibic;
use NumaxLab\Geslib\Lines\Language;
use NumaxLab\Geslib\Lines\LineInterface;
use NumaxLab\Geslib\Lines\Preposition;
use NumaxLab\Geslib\Lines\PressPublication;
use NumaxLab\Geslib\Lines\Province;
use NumaxLab\Geslib\Lines\RecordLabel;
use NumaxLab\Geslib\Lines\Status;
use NumaxLab\Geslib\Lines\Stock;
use NumaxLab\Geslib\Lines\Topic;
use NumaxLab\Geslib\Lines\Type;
use NumaxLab\Geslib\Lines\Warning;

final class LineFactory
{
    public const INITIAL_FILE_CODE = 'I';

    private static array $entitiesCodes = [
        Editorial::CODE => Editorial::class,
        RecordLabel::CODE => RecordLabel::class,
        '1P' => null,
        PressPublication::CODE => PressPublication::class,
        Collection::CODE => Collection::class,
        Topic::CODE => Topic::class,
        Article::CODE => Article::class,
        EBook::CODE => EBook::class,
        EbookInfo::CODE => EbookInfo::class,
        ArticleTopic::CODE => ArticleTopic::class,
        Ibic::CODE => Ibic::class,
        BookshopReference::CODE => BookshopReference::class,
        BookshopReferenceTranslation::CODE => BookshopReferenceTranslation::class,
        EditorialReference::CODE => EditorialReference::class,
        EditorialReferenceTranslation::CODE => EditorialReferenceTranslation::class,
        ArticleIndex::CODE => ArticleIndex::class,
        ArticleIndexTranslation::CODE => ArticleIndexTranslation::class,
        ArticleAuthor::CODE => ArticleAuthor::class,
        BindingType::CODE => BindingType::class,
        Language::CODE => Language::class,
        Preposition::CODE => Preposition::class,
        Stock::CODE => Stock::class,
        'B2' => null,
        Status::CODE => Status::class,
        'CLI' => null,
        Author::CODE => Author::class,
        'IPC' => null,
        'P' => null,
        'PROCEN' => null,
        'PC' => null,
        'VTA' => null,
        Country::CODE => Country::class,
        ArticleBatchHeader::CODE => ArticleBatchHeader::class,
        ArticleBatchLine::CODE => ArticleBatchLine::class,
        Type::CODE => Type::class,
        Classification::CODE => Classification::class,
        'ATRA' => null,
        'CLOTCLI' => null,
        'LLOTCLI' => null,
        'PROFES' => null,
        Province::CODE => Province::class,
        'CAGRDTV' => null,
        'LAGRDTV' => null,
        'CLIDTO' => null,
        'CDG' => null,
        'LDG' => null,
        AuthorBiography::CODE => AuthorBiography::class,
        'EMBALA' => null,
        'PACK' => null,
        Warning::CODE => Warning::class,
    ];

    public static function create(string $code, array $lineFields): LineInterface
    {
        if (!array_key_exists($code, self::$entitiesCodes)) {
            throw new InvalidLineCodeException(sprintf('Invalid line with code %s', $code));
        }

        $lineClass = self::$entitiesCodes[$code];

        if ($lineClass === null) {
            throw new NotImplementedLineCodeException(
                sprintf('The line with code %s has not an implemented class', $code),
            );
        }

        return $lineClass::fromLine($lineFields);
    }
}
