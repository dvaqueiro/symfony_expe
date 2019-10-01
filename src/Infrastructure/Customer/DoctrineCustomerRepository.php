<?php

namespace App\Infrastructure\Customer;

use App\Domain\Customer\Customer;
use App\Domain\Customer\CustomerRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class DoctrineCustomerRepository extends ServiceEntityRepository implements CustomerRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Customer::class);
    }

    public function all(): array
    {
        return $this->findAll();
    }

    public function save(Customer $customer): bool
    {
        $manager = $this->getEntityManager();
        $manager->persist($customer);
        $manager->flush($customer);
    }
}
