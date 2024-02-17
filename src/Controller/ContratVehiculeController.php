<?php

namespace App\Controller;
use App\Repository\VehicleRequestRepository;
use App\Entity\VehicleRequest;

use App\Entity\ContratVehicule;
use App\Form\ContratVehiculeType;
use App\Repository\ContratVehiculeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contrat/vehicule')]
class ContratVehiculeController extends AbstractController
{
    #[Route('/', name: 'app_contrat_vehicule_index', methods: ['GET'])]
    public function index(ContratVehiculeRepository $contratVehiculeRepository): Response
    {
        return $this->render('contrat_vehicule/index.html.twig', [
            'contrat_vehicules' => $contratVehiculeRepository->findAll(),
        ]);
    }

    #[Route('/New_ContratVehicule', name: 'app_contrat_vehicule_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
         $contratVehicule = new ContratVehicule();
            $form = $this->createForm(ContratVehiculeType::class, $contratVehicule);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $description = strip_tags($contratVehicule->getDescription());
                $contratVehicule->setDescription($description);
                $entityManager->persist($contratVehicule);
                $entityManager->flush();

                return $this->redirectToRoute('app_contrat_vehicule_index', [], Response::HTTP_SEE_OTHER);
            }

            return $this->renderForm('contrat_vehicule/new.html.twig', [
                'contrat_vehicule' => $contratVehicule,
                'form' => $form,
            ]);
    }

    #[Route('/{id}', name: 'app_contrat_vehicule_show', methods: ['GET'])]
    public function show(ContratVehicule $contratVehicule): Response
    {
        return $this->render('contrat_vehicule/show.html.twig', [
            'contrat_vehicule' => $contratVehicule,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_contrat_vehicule_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ContratVehicule $contratVehicule, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContratVehiculeType::class, $contratVehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_contrat_vehicule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contrat_vehicule/edit.html.twig', [
            'contrat_vehicule' => $contratVehicule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contrat_vehicule_delete', methods: ['POST'])]
    public function delete(Request $request, ContratVehicule $contratVehicule, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contratVehicule->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contratVehicule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_contrat_vehicule_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/showDemandes_vehicule', name: 'app_contrat_vehicule_show_in_contrat', methods: ['GET'])]
        public function showDemandes_vehicule(VehicleRequestRepository $vehicleRequestRepository): Response
        {
            return $this->render('contrat_vehicule/showDemandes.html.twig', [
                'vehicle_requests' => $vehicleRequestRepository->findAll(),
            ]);
        }

}
