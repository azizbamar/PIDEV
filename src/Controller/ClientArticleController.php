<?php

namespace App\Controller;

use App\Form\CommentType;
use App\Entity\{Article, Comment};
use Doctrine\ORM\EntityManagerInterface;
use http\Client\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientArticleController extends AbstractController
{
    #[Route('/client/article', name: 'app_client_article')]
    public function index(): Response
    {
        $articleRepository = $this->getDoctrine()->getRepository(Article::class);
        $articles = $articleRepository->findAll();

        return $this->render('client_article/index.html.twig', [
            'articles' => $articles,
        ]);
    }
    #[Route('/client/article/{id}', name: 'app_client_articlebyid')]
    public function article($id): Response
    {
        $articleRepository = $this->getDoctrine()->getRepository(Article::class);
        $articles = $articleRepository->find($id);

        return $this->render('client_article/index.html.twig', [
            'articles' => $articles,
            'form' => $this->createForm(CommentType::class)->createView(),




        ]);
    }
}
