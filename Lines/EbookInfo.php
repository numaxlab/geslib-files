<?php

namespace NumaxLab\Geslib\Lines;

final class EbookInfo implements LineInterface
{
    public const CODE = 'IEB';

    private readonly string $articleId;
    private readonly string $providerReference;
    private readonly string $trevenqueReference;
    private readonly string $size;
    private readonly string $license;
    private readonly string $url;
    private readonly int $downloadsQty;

    public function __construct(
        string $articleId,
        string $providerReference,
        string $trevenqueReference,
        string $size,
        string $license,
        string $url,
        int $downloadsQty,
    ) {
        $this->articleId = $articleId;
        $this->providerReference = $providerReference;
        $this->trevenqueReference = $trevenqueReference;
        $this->size = $size;
        $this->license = $license;
        $this->url = $url;
        $this->downloadsQty = $downloadsQty;
    }

    public static function getCode(): string
    {
        return self::CODE;
    }

    public static function fromLine(array $line): self
    {
        return new self(
            $line[1],
            $line[2],
            $line[3],
            $line[4],
            $line[5],
            $line[6],
            (int)$line[7],
        );
    }

    public static function code(): string
    {
        return self::CODE;
    }

    public function articleId(): string
    {
        return $this->articleId;
    }

    public function providerReference(): string
    {
        return $this->providerReference;
    }

    public function trevenqueReference(): string
    {
        return $this->trevenqueReference;
    }

    public function size(): string
    {
        return $this->size;
    }

    public function license(): string
    {
        return $this->license;
    }

    public function url(): string
    {
        return $this->url;
    }

    public function downloadsQty(): int
    {
        return $this->downloadsQty;
    }
}
