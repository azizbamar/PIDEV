<?php

namespace App\Controller;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    #[Route('/client', name: 'app_client')]
    public function client(ArticleRepository $articleRepository,FlashyNotifier $flashy ): Response
    {

        $flashy->success('explorer notre articles !', 'http://your-awesome-link.com');
        return $this->render('client/index.html.twig',[
            'articles' => $articleRepository->findAll(),
        ]);
    }

}
