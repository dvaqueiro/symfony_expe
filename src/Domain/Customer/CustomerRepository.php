<?php

namespace App\Domain\Customer;

interface CustomerRepository
{
    public function all(): array;
    public function save(Customer $customer): bool;
}
