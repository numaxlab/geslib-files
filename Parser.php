<?php

namespace NumaxLab\Geslib;

class Parser
{
    /**
     * @var GeslibFile
     */
    private $file;

    /**
     * @var string
     */
    private $endOfLine;

    public function __construct(GeslibFile $file, string $eol)
    {
        $this->file = $file;
        $this->endOfLine = $eol;
    }

    public function parse(string $input): GeslibFile
    {
        $lines = explode($this->endOfLine, $input);

        foreach ($lines as $lineNumber => $line) {
            $lineFields = explode(GeslibFile::FIELD_SEPARATOR, $line);

            if (empty(trim($lineFields[0]))) {
                continue;
            }

            if ($lineNumber === 0 && $lineFields[0] === LineFactory::INITIAL_FILE_CODE) {
                $this->file->setAsInitialFile();
                continue;
            }

            $lineObject = LineFactory::create($lineFields[0], $lineFields);

            $this->file->addLine($lineObject);
        }

        return $this->file;
    }
}
