<?php

namespace App\Controller;

use App\Form\CommentType;
use App\Form\CommentFormType;
use App\Entity\{Article, Comment};
use Doctrine\ORM\EntityManagerInterface;
use http\Client\Request;
use MercurySeries\FlashyBundle\FlashyNotifier;
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
    public function article($id,FlashyNotifier $flashy): Response
    {
        $articleRepository = $this->getDoctrine()->getRepository(Article::class);
        $articles = $articleRepository->find($id);
        $flashy->success('test');
        return $this->render('client_article/index.html.twig', [
            'article' => $articles,
            'form' => $this->createForm(CommentType::class)->createView(),

        ]);

    }


    public function showArticle(Request $request, EntityManagerInterface $entityManager, $id): Response
    {

        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);


        // Create a new instance of the comment form
        $commentForm = $this->createForm(CommentFormType::class);

        // Handle form submission if applicable
        $commentForm->handleRequest($request);
        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            // Process the form submission
            // For example, save the comment to the database
            $comment = $commentForm->getData();
            $entityManager->persist($comment);
            $entityManager->flush();

            // Optionally, add a success message
            $this->addFlash('success', 'Your comment has been submitted successfully.');
        }

        // Render the template, passing the article and form variables
        return $this->render('comment/_form.html.twig', [
            'article' => $article,
            'form' => $commentForm->createView(),
        ]);
    }
    #[Route('/new', name: 'app_comment_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, FlashyNotifier $flashy): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($comment);
            $entityManager->flush();
            $flashy->success('Commentaire ajouté!');

            return $this->redirectToRoute('app_client_article', [], Response::HTTP_SEE_OTHER);
        }

        if ($form->isSubmitted() && !$form->isValid()) {
            $flashy->error('Failed to add comment. Please check the form.');
        }

        return $this->renderForm('', [
            'comment' => $comment,
            'form' => $form,
        ]);
    }
}
