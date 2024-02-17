<?php

namespace App\Controller;
use App\Entity\PropretyRequest;
use App\Entity\ContratHabitat;
use App\Form\ContratHabitatType;
use App\Repository\ContratHabitatRepository;
use App\Repository\PropretyRequestRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contrat/habitat')]
class ContratHabitatController extends AbstractController
{
    #[Route('/', name: 'app_contrat_habitat_index', methods: ['GET'])]
    public function index(ContratHabitatRepository $contratHabitatRepository): Response
    {
        return $this->render('contrat_habitat/index.html.twig', [
            'contrat_habitats' => $contratHabitatRepository->findAll(),
        ]);
    }

    #[Route('/New_ContratHabitat', name: 'app_contrat_habitat_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contratHabitat = new ContratHabitat();
        $form = $this->createForm(ContratHabitatType::class, $contratHabitat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contratHabitat);
            $entityManager->flush();

            return $this->redirectToRoute('app_contrat_habitat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contrat_habitat/new.html.twig', [
            'contrat_habitat' => $contratHabitat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contrat_habitat_show', methods: ['GET'])]
    public function show(ContratHabitat $contratHabitat): Response
    {
        return $this->render('contrat_habitat/show.html.twig', [
            'contrat_habitat' => $contratHabitat,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_contrat_habitat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ContratHabitat $contratHabitat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContratHabitatType::class, $contratHabitat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_contrat_habitat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contrat_habitat/edit.html.twig', [
            'contrat_habitat' => $contratHabitat,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contrat_habitat_delete', methods: ['POST'])]
    public function delete(Request $request, ContratHabitat $contratHabitat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contratHabitat->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contratHabitat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_contrat_habitat_index', [], Response::HTTP_SEE_OTHER);
    }


           #[Route('/showDemandes_habitat', name: 'app_contrat_habitat_show_in_contrat', methods: ['GET'])]
                          public function showDemandes_habitat(PropretyRequestRepository $propretyRequestRepository): Response
                          {
                              return $this->render('contrat_habitat/showDemandes.html.twig', [
                                  'proprety_requests' => $propretyRequestRepository->findAll(),
                              ]);
                          }
}

