<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

class ArticleGpsr implements LineInterface
{
    const CODE = 'ARTGPSR';

    private readonly string $articleId;
    private readonly ?int $unknown1;
    private readonly ?string $unknown2;
    private readonly ?string $unknown3;
    private readonly ?string $url;

    private function __construct(
        string $articleId,
        ?int $unknown1,
        ?string $unknown2,
        ?string $unknown3,
        ?string $url
    ) {
        $this->articleId = $articleId;
        $this->unknown1 = $unknown1;
        $this->unknown2 = $unknown2;
        $this->unknown3 = $unknown3;
        $this->url = $url;
    }

    public static function getCode(): string
    {
        return self::CODE;
    }

    public static function fromLine(array $line): self
    {
        // Assuming $line[0] is the CODE 'ARTGPSR'
        // $line[1] is articleId
        // $line[2] is unknown1
        // $line[3] is unknown2
        // $line[4] is unknown3
        // $line[5] is url
        return self::create(
            TypeCast::string($line[1]),
            TypeCast::integer($line[2]),
            TypeCast::string($line[3]),
            TypeCast::string($line[4]),
            TypeCast::string($line[5])
        );
    }

    public static function create(
        string $articleId,
        ?int $unknown1,
        ?string $unknown2,
        ?string $unknown3,
        ?string $url
    ): self {
        return new self(
            $articleId,
            $unknown1,
            $unknown2,
            $unknown3,
            $url
        );
    }

    public function articleId(): string
    {
        return $this->articleId;
    }

    public function unknown1(): ?int
    {
        return $this->unknown1;
    }

    public function unknown2(): ?string
    {
        return $this->unknown2;
    }

    public function unknown3(): ?string
    {
        return $this->unknown3;
    }

    public function url(): ?string
    {
        return $this->url;
    }
}
