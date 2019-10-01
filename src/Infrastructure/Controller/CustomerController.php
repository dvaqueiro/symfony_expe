<?php

namespace App\Infrastructure\Controller;

use App\Domain\Customer\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    public function home(CustomerRepository $repository)
    {
        $customers = $repository->all();
        dump($customers);
        return $this->render('base.html.twig', [
            'message' => 'this is a customer home page',
        ]);
    }
}
