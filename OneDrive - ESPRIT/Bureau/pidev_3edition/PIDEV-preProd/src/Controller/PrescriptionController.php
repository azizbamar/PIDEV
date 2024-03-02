<?php

namespace App\Controller;

use App\Entity\Prescription;
use App\Form\PrescriptionType;
use App\Repository\PrescriptionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use App\Service\DrugService;


#[Route('/prescription')]
class PrescriptionController extends AbstractController
{
    #[Route('/', name: 'app_prescription_index', methods: ['GET'])]
    public function index(PrescriptionRepository $prescriptionRepository): Response
    {
        return $this->render('prescription/index.html.twig', [
            'prescriptions' => $prescriptionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_prescription_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $prescription = new Prescription();
        $form = $this->createForm(PrescriptionType::class, $prescription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($prescription);
            $entityManager->flush();

            return $this->redirectToRoute('app_prescription_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('prescription/new.html.twig', [
            'prescription' => $prescription,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_prescription_show', methods: ['GET'])]
    public function show(Prescription $prescription): Response
    {
        return $this->render('prescription/show.html.twig', [
            'prescription' => $prescription,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_prescription_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Prescription $prescription, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PrescriptionType::class, $prescription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_prescription_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('prescription/edit.html.twig', [
            'prescription' => $prescription,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_prescription_delete', methods: ['POST'])]
    public function delete(Request $request, Prescription $prescription, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $prescription->getId(), $request->request->get('_token'))) {
            $entityManager->remove($prescription);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_prescription_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/prescription/{id}/export-pdf', name: 'prescription_export_pdf')]
    public function exportToPdfAction(Prescription $prescription)
    {
        $data = [
            'datePrescription' => $prescription->getDatePrescription()->format('Y-m-d'),
            'medications' => $prescription->getMedications(),
            'statusPrescription' => $prescription->getStatusPrescription(),
            'additionalNotes' => $prescription->getAdditionalNotes(),
            'validityDuration' => $prescription->getValidityDuration(),
            'userCIN' => $prescription->getUserCIN(),
        ];

        $html = $this->renderView('prescription/pdf_template.html.twig', [
            'prescription' => $data,
        ]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);


        $dompdf->render();


        return new Response($dompdf->output(), Response::HTTP_OK, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="prescription_' . $prescription->getId() . '.pdf"',
        ]);
    }


    #[Route('/drug-search', name: 'drug_search')]
    public function searchDrug(Request $request, DrugService $drugService): Response
    {
        $drugName = $request->query->get('drugName');
        $drugDetails = null;

        if ($drugName) {
            $drugDetails = $drugService->searchDrug($drugName);
        }

        // Render the same `show.html.twig` with additional `drugDetails` or a separate template as needed
        return $this->render('prescription/show.html.twig', [
            'drugDetails' => $drugDetails,
            // Pass other required variables for the `show.html.twig` template
        ]);
    }
}
