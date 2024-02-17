<?php

namespace App\Controller;

use App\Entity\Sinister;
use App\Entity\SinisterLife;
use App\Form\SinisterLifeType;
use App\Repository\SinisterLifeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Util\ClassUtils;

#[Route('/sinister/life')]
class SinisterLifeController extends AbstractController
{
    #[Route('/', name: 'app_sinister_life_index', methods: ['GET'])]
    public function index(SinisterLifeRepository $sinisterLifeRepository): Response
    {
        return $this->render('sinister_life/index.html.twig', [
            'sinister_lives' => $sinisterLifeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_sinister_life_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sinisterLife = new SinisterLife();
        $sinisterLife->setDateSinister(new \DateTime());
        $form = $this->createForm(SinisterLifeType::class, $sinisterLife);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($sinisterLife);
            $entityManager->flush();

            return $this->redirectToRoute('app_sinister_life_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sinister_life/new.html.twig', [
            'sinister_life' => $sinisterLife,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sinister_life_show', methods: ['GET'])]
    public function show(SinisterLife $sinisterLife): Response
    {
        return $this->render('sinister_life/show.html.twig', [
            'sinister_life' => $sinisterLife,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sinister_life_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SinisterLife $sinisterLife, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SinisterLifeType::class, $sinisterLife);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_sinister_life_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sinister_life/edit.html.twig', [
            'sinister_life' => $sinisterLife,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sinister_life_delete', methods: ['POST'])]
    public function delete(Request $request, SinisterLife $sinisterLife, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sinisterLife->getId(), $request->request->get('_token'))) {
            $entityManager->remove($sinisterLife);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_sinister_life_index', [], Response::HTTP_SEE_OTHER);
    }
}
