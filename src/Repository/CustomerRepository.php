<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Customer;

class CustomerRepository
{
    private array $customers;

    public function __construct()
    {
        $this->customers = [
            new Customer("Juan", "Pérez", 1200),
            new Customer("Pedro", "López", 100),
            new Customer("Sergio", "Moreno", 1000),
        ];
    }

    /**
     * @return Customer[]
     */
    public function findByAmount(float $amount): array
    {
        return array_values(
            array_filter(
                $this->customers,
                fn(Customer $c) => $c->getAmount() > $amount
            )
        );
    }
}
