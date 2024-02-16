<?php

namespace App\Controller;

use App\Entity\MedicalSheet;
use App\Form\MedicalSheetType;
use App\Repository\MedicalSheetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/medical/sheet')]
class MedicalSheetController extends AbstractController
{
    #[Route('/', name: 'app_medical_sheet_index', methods: ['GET'])]
    public function index(MedicalSheetRepository $medicalSheetRepository): Response
    {
        return $this->render('medical_sheet/index.html.twig', [
            'medical_sheets' => $medicalSheetRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_medical_sheet_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $medicalSheet = new MedicalSheet();
        $form = $this->createForm(MedicalSheetType::class, $medicalSheet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($medicalSheet);
            $entityManager->flush();

            return $this->redirectToRoute('app_medical_sheet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('medical_sheet/new.html.twig', [
            'medical_sheet' => $medicalSheet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_medical_sheet_show', methods: ['GET'])]
    public function show(MedicalSheet $medicalSheet): Response
    {
        return $this->render('medical_sheet/show.html.twig', [
            'medical_sheet' => $medicalSheet,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_medical_sheet_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MedicalSheet $medicalSheet, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MedicalSheetType::class, $medicalSheet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_medical_sheet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('medical_sheet/edit.html.twig', [
            'medical_sheet' => $medicalSheet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_medical_sheet_delete', methods: ['POST'])]
    public function delete(Request $request, MedicalSheet $medicalSheet, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medicalSheet->getId(), $request->request->get('_token'))) {
            $entityManager->remove($medicalSheet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_medical_sheet_index', [], Response::HTTP_SEE_OTHER);
    }
}
