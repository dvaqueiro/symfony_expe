<?php

namespace App\Domain\Customer;

class Customer
{
    private $customerId;
    private $name;
    private $firstSurname;
    private $lastSurname;
    private $street;
    private $streetNumber;
    private $floor;
    private $postalCode;
    private $city;
    private $status;

    public function __construct(
        string $customerId,
        string $name,
        string $firstSurname,
        ?string $lastSurname,
        string $street,
        string $streetNumber,
        string $floor,
        string $postalCode,
        string $city
    ) {
        $this->customerId = $customerId;
        $this->name = $name;
        $this->firstSurname = $firstSurname;
        $this->lastSurname = $lastSurname;
        $this->street = $street;
        $this->streetNumber = $streetNumber;
        $this->floor = $floor;
        $this->postalCode = $postalCode;
        $this->city = $city;
        $this->status = 'NEW';
    }

    public function customerId(): string
    {
        return $this->customerId;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function firstSurname(): string
    {
        return $this->firstSurname;
    }

    public function lastSurname(): ?string
    {
        return $this->lastSurname;
    }

    public function street(): string
    {
        return $this->street;
    }

    public function streetNumber(): string
    {
        return $this->streetNumber;
    }

    public function floor(): string
    {
        return $this->floor;
    }

    public function postalCode(): string
    {
        return $this->postalCode;
    }

    public function city(): string
    {
        return $this->city;
    }

    public function status(): string
    {
        return $this->status;
    }
}
