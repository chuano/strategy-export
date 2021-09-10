<?php

declare(strict_types=1);

namespace App\Model;

class Customer
{
    private string $name;
    private string $lastName;
    private float $amount;

    public function __construct(string $name, string $lastName, float $amount)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->amount = $amount;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }
}
