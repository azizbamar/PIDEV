<?php

namespace App\Controller;
use App\Entity\User;

use App\Entity\PropretyRequest;
use App\Form\PropretyRequestType;
use App\Repository\PropretyRequestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/proprety/request')]
class PropretyRequestController extends AbstractController
{
    #[Route('/', name: 'app_proprety_request_index', methods: ['GET'])]
    public function index(PropretyRequestRepository $propretyRequestRepository): Response
    {
        return $this->render('proprety_request/index.html.twig', [
            'proprety_requests' => $propretyRequestRepository->findAll(),
        ]);
    }

    #[Route('/New_PropretyRequest', name: 'app_proprety_request_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $propretyRequest = new PropretyRequest();
        $form = $this->createForm(PropretyRequestType::class, $propretyRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($propretyRequest);
            $entityManager->flush();

            return $this->redirectToRoute('app_proprety_request_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('proprety_request/new.html.twig', [
            'proprety_request' => $propretyRequest,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_proprety_request_show', methods: ['GET'])]
    public function show(PropretyRequest $propretyRequest): Response
    {
        return $this->render('proprety_request/show.html.twig', [
            'proprety_request' => $propretyRequest,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_proprety_request_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PropretyRequest $propretyRequest, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PropretyRequestType::class, $propretyRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_proprety_request_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('proprety_request/edit.html.twig', [
            'proprety_request' => $propretyRequest,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_proprety_request_delete', methods: ['POST'])]
    public function delete(Request $request, PropretyRequest $propretyRequest, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$propretyRequest->getId(), $request->request->get('_token'))) {
            $entityManager->remove($propretyRequest);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_proprety_request_index', [], Response::HTTP_SEE_OTHER);
    }
}
