<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\CustomerRepository;

class ExportCustomers
{
    private CustomerRepository $customerRepository;
    private Writer $writer;

    public function __construct(CustomerRepository $customerRepository, Writer $writer)
    {
        $this->customerRepository = $customerRepository;
        $this->writer = $writer;
    }

    public function __invoke(string $filename, float $amount): void
    {
        $customers = $this->customerRepository->findByAMount($amount);
        $this->writer->write($customers, $filename);
    }
}
