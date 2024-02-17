<?php

namespace App\Controller;
use App\Repository\LifeRequestRepository;
use App\Entity\LifeRequest;

use App\Entity\ContratVie;
use App\Form\ContratVieType;
use App\Repository\ContratVieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contrat/vie')]
class ContratVieController extends AbstractController
{
    #[Route('/', name: 'app_contrat_vie_index', methods: ['GET'])]
    public function index(ContratVieRepository $contratVieRepository): Response
    {
        return $this->render('contrat_vie/index.html.twig', [
            'contrat_vies' => $contratVieRepository->findAll(),
        ]);
    }

    #[Route('/New_ContratVie', name: 'app_contrat_vie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contratVie = new ContratVie();
        $form = $this->createForm(ContratVieType::class, $contratVie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contratVie);
            $entityManager->flush();

            return $this->redirectToRoute('app_contrat_vie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contrat_vie/new.html.twig', [
            'contrat_vie' => $contratVie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contrat_vie_show', methods: ['GET'])]
    public function show(ContratVie $contratVie): Response
    {
        return $this->render('contrat_vie/show.html.twig', [
            'contrat_vie' => $contratVie,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_contrat_vie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ContratVie $contratVie, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContratVieType::class, $contratVie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_contrat_vie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contrat_vie/edit.html.twig', [
            'contrat_vie' => $contratVie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contrat_vie_delete', methods: ['POST'])]
    public function delete(Request $request, ContratVie $contratVie, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contratVie->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contratVie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_contrat_vie_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/showDemandes_vie', name: 'app_contrat_vie_show_in_contrat', methods: ['GET'])]
        public function showDemandes_vie(LifeRequestRepository $lifeRequestRepository): Response
        {
            return $this->render('contrat_vie/showDemandes.html.twig', [
                'life_requests' => $lifeRequestRepository->findAll(),
            ]);
        }
}
