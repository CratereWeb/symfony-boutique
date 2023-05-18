<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerAddressController extends AbstractController
{
    #[Route('/customer/address', name: 'app_customer_address')]
    public function index(): Response
    {
        return $this->render('customer_address/index.html.twig', [
            'controller_name' => 'CustomerAddressController',
        ]);
    }
}
