<?php

declare(strict_types=1);

namespace App\Service\Writer;

use App\Model\Customer;

class CsvWriter implements Writer
{
    public function write(array $customers, string $filename): void
    {
        $lines = array_map(
            fn(Customer $customer) => $customer->getName() . ";" . $customer->getLastName(
                ) . ";" . $customer->getAmount(),
            $customers
        );

        $fp = fopen($filename, "w+");
        fwrite($fp, implode("\n", $lines));
        fclose($fp);
    }
}
