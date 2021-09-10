<?php

namespace App\Service\Writer;

interface Writer
{
    public function write(array $customers, string $filename): void;
}
