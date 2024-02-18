<?php

namespace App\Controller;

use App\Repository\MedicalSheetRepository;
use App\Repository\PrescriptionRepository;
use App\Repository\SinisterLifeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function admin(): Response
    {
        return $this->render('admin/sidebar.html.twig');
    }
    #[Route('/showSinisterLifeAdmin', name: 'app_sinister_life_dashboard', methods: ['GET'])]
    public function showSinisterLifeAdmin(SinisterLifeRepository $sinisterLifeRepository): Response
    {
        return $this->render('admin/showSLadmin.html.twig', [
            'sinister_lives' => $sinisterLifeRepository->findAll(),
        ]);
    }
    #[Route('/showMedicalSheetsAdmin', name: 'app_medical_sheet_dashboard', methods: ['GET'])]
    public function showMedicalSheetsAdmin(MedicalSheetRepository $medicalSheetRepository): Response
    {
        return $this->render('admin/showMSadmin.html.twig', [
            'medical_sheets' => $medicalSheetRepository->findAll(),
        ]);
    }

    #[Route('/showPrescriptionsAdmin', name: 'app_prescription_dashboard', methods: ['GET'])]
    public function showPrescriptionsAdmin(PrescriptionRepository $prescriptionRepository): Response
    {
        return $this->render('admin/showPadmin.html.twig', [
            'prescriptions' => $prescriptionRepository->findAll(),
        ]);
    }

}
