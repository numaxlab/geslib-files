<?php

namespace NumaxLab\Geslib;

final readonly class Parser
{
    private GeslibFile $file;
    private string $eol;

    public function __construct(GeslibFile $file, string $eol = PHP_EOL)
    {
        $this->file = $file;
        $this->eol = $eol;
    }

    public function parse(string $input): GeslibFile
    {
        $lines = explode($this->eol, $input);

        foreach ($lines as $lineNumber => $line) {
            $lineFields = explode(GeslibFile::FIELD_SEPARATOR, $line);
            $code = trim($lineFields[0]);

            if (empty($code)) {
                continue;
            }

            if ($lineNumber === 0 && $code === LineFactory::INITIAL_FILE_CODE) {
                $this->file->setAsInitialFile();
                continue;
            }

            $lineObject = LineFactory::create($code, $lineFields);
            $this->file->addLine($lineObject);
        }

        return $this->file;
    }
}
