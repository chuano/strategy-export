<?php

namespace Tests\Service;

use App\Repository\CustomerRepository;
use App\Service\ExportCustomers;
use App\Service\Writer\WriterFactory;
use PHPUnit\Framework\TestCase;

class ExportCustomersTest extends TestCase
{
    /** @test */
    public function should_export_customers_whith_more_than_given_amount_in_txt(): void
    {
        $fileName = __DIR__ . "customers.txt";

        $writer = WriterFactory::getWriter($fileName);
        $service = new ExportCustomers(new CustomerRepository(), $writer);
        $service($fileName, 900);

        $this->assertFileExists($fileName);
        $this->assertEquals($this->expectedTxt(), file_get_contents($fileName));
        unlink($fileName);
    }

    /** @test */
    public function should_export_customers_whith_more_than_given_amount_in_csv(): void
    {
        $fileName = __DIR__ . "customers.csv";

        $writer = WriterFactory::getWriter($fileName);
        $service = new ExportCustomers(new CustomerRepository(), $writer);
        $service($fileName, 900);

        $this->assertFileExists($fileName);
        $this->assertEquals($this->expectedCsv(), file_get_contents($fileName));
        unlink($fileName);
    }

    private function expectedTxt(): string
    {
        return "Juan Pérez 1200\nSergio Moreno 1000";
    }

    private function expectedCsv(): string
    {
        return "Juan;Pérez;1200\nSergio;Moreno;1000";
    }
}
