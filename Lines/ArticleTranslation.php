<?php

namespace NumaxLab\Geslib\Lines;

use NumaxLab\Geslib\TypeCast;

class ArticleTranslation implements LineInterface
{
    const CODE = 'ATRA';

    private readonly Action $action;
    private readonly int $articleId;
    private readonly string $languageId;
    private readonly ?string $description;
    private readonly ?string $externalDescription;

    private function __construct(
        Action $action,
        int $articleId,
        string $languageId,
        ?string $description,
        ?string $externalDescription
    ) {
        $this->action = $action;
        $this->articleId = $articleId;
        $this->languageId = $languageId;
        $this->description = $description;
        $this->externalDescription = $externalDescription;
    }

    public static function getCode(): string
    {
        return self::CODE;
    }

    public static function fromLine(array $line): self
    {
        $action = Action::fromCode($line[1]);

        $articleId = TypeCast::integer($line[2]);

        if ($action->isDelete()) {
            // The problem description says languageId is not nullable,
            // but for a delete action, only the primary key (articleId)
            // and perhaps languageId might be present.
            // Assuming for delete, we might only have articleId.
            // If languageId is also required for delete, this needs adjustment.
            // For now, to prevent errors with TypeCast::string(null) if $line[3] is not set:
            $languageId = TypeCast::string($line[3] ?? ''); // Or handle more robustly
            return self::createWithDeleteAction($articleId, $languageId);
        }

        return self::createWithAction(
            $action,
            $articleId,
            TypeCast::string($line[3]),
            TypeCast::string($line[4]),
            TypeCast::string($line[5])
        );
    }

    public static function createWithDeleteAction(int $articleId, string $languageId): self
    {
        // As per previous comment, if languageId is truly part of the key for deletion.
        // If not, the signature and instantiation might change.
        return new self(Action::fromCode(Action::DELETE), $articleId, $languageId, null, null);
    }

    public static function createWithAction(
        Action $action,
        int $articleId,
        string $languageId,
        ?string $description,
        ?string $externalDescription
    ): self {
        return new self(
            $action,
            $articleId,
            $languageId,
            $description,
            $externalDescription
        );
    }

    public function action(): Action
    {
        return $this->action;
    }

    public function articleId(): int
    {
        return $this->articleId;
    }

    public function languageId(): string
    {
        return $this->languageId;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function externalDescription(): ?string
    {
        return $this->externalDescription;
    }
}
