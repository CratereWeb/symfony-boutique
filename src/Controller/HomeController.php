<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class HomeController extends AbstractController
{
    #[Route('/', 'app_home', methods: ['GET'])]
    public function index(): Response
    {
        if($this->isGranted('ROLE_ADMIN'))
        {
            return $this->render('home/admin.home.html.twig');
            
        } else if($this->isGranted('ROLE_USER')) {

            return $this->render('home/user.home.html.twig');

        } else {
            return $this->render('home/home.html.twig');
        }
    }
}
