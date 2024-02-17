<?php

namespace App\Controller;

use App\Entity\SinisterProperty;
use App\Form\SinisterPropertyType;
use App\Repository\SinisterPropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sinister/property')]
class SinisterPropertyController extends AbstractController
{
    #[Route('/', name: 'app_sinister_property_index', methods: ['GET'])]
    public function index(SinisterPropertyRepository $sinisterPropertyRepository): Response
    {
        return $this->render('sinister_property/index.html.twig', [
            'sinister_properties' => $sinisterPropertyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_sinister_property_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sinisterProperty = new SinisterProperty();
        $form = $this->createForm(SinisterPropertyType::class, $sinisterProperty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($sinisterProperty);
            $entityManager->flush();

            return $this->redirectToRoute('app_sinister_property_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sinister_property/new.html.twig', [
            'sinister_property' => $sinisterProperty,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sinister_property_show', methods: ['GET'])]
    public function show(SinisterProperty $sinisterProperty): Response
    {
        return $this->render('sinister_property/show.html.twig', [
            'sinister_property' => $sinisterProperty,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sinister_property_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SinisterProperty $sinisterProperty, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SinisterPropertyType::class, $sinisterProperty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_sinister_property_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sinister_property/edit.html.twig', [
            'sinister_property' => $sinisterProperty,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sinister_property_delete', methods: ['POST'])]
    public function delete(Request $request, SinisterProperty $sinisterProperty, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sinisterProperty->getId(), $request->request->get('_token'))) {
            $entityManager->remove($sinisterProperty);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_sinister_property_index', [], Response::HTTP_SEE_OTHER);
    }
}
