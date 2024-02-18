<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use symfony\Component\HttpFoundation\RedirectResponse;

class ClientController extends AbstractController
{
    #[Route('/client', name: 'app_client')]
    public function client(): Response
    {
        return $this->render('client/index.html.twig');
    }
    #[Route('/homepage', name: 'app_homepage')]
    public function homepage(): Response
    {
        return $this->render('client/homepage.html.twig');
    }
}
