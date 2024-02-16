<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    #[Route('/client', name: 'app_client')]
    public function client(): Response
    {
        return $this->render('client/index.html.twig');
    }
    #[Route('/HomePage', name: 'Home_Page')]
            public function HomePage(): Response
            {
                return $this->render('client/HomePage.html.twig');
            }
}
