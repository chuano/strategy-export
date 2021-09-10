<?php

declare(strict_types=1);

namespace App\Service\Writer;

class WriterFactory
{
    public static function getWriter(string $filename): Writer
    {
        $fileNameParts = explode(".", $filename);
        $extension = $fileNameParts[count($fileNameParts) - 1];

        switch ($extension) {
            case 'txt':
                return new TxtWriter();
            case 'csv':
                return new CsvWriter();
            default:
                throw new \Exception('Writer not implemented for ' . $extension . ' files');
        }
    }
}
