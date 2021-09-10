<?php

namespace App\Service;

interface Writer
{
    public function write(array $customers, string $filename): void;
}
