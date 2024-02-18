<?php

namespace App\Controller;
use App\Entity\Question;

use App\Entity\ServiceLife;
use App\Form\ServiceLifeType;
use App\Repository\ServiceLifeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/service/life')]
class ServiceLifeController extends AbstractController
{
    #[Route('/', name: 'app_service_life_index', methods: ['GET'])]
    public function index(ServiceLifeRepository $serviceLifeRepository): Response
    {
        return $this->render('service_life/index.html.twig', [
            'service_lives' => $serviceLifeRepository->findAll(),
        ]);
    }

    #[Route('/lifequestion/{id}', name: 'app_service_life_index_per_question', methods: ['GET'])]
    public function index1($id,ServiceLifeRepository $serviceLifeRepository): Response
    {
        return $this->render('service_auto/showperquestion.html.twig', [
            'service_lives' => $serviceLifeRepository->findBy(["question"=>$id]),
            'id' => $id,
        ]);
    }


    #[Route('/{id}/new', name: 'app_service_life_new', methods: ['GET', 'POST'])]
    public function newService($id,Request $request, EntityManagerInterface $entityManager): Response
    {
        $serviceLife = new ServiceLife();
        $form = $this->createForm(ServiceLifeType::class, $serviceLife);
        $form->handleRequest($request);
        $question = $entityManager->getRepository(Question::class)->find($id);
        $serviceLife->setQuestion($question);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($serviceLife);
            $entityManager->flush();

            return $this->redirectToRoute('app_service_life_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('service_life/new.html.twig', [
            'service_life' => $serviceLife,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_service_life_show', methods: ['GET'])]
    public function show(ServiceLife $serviceLife): Response
    {
        return $this->render('service_life/show.html.twig', [
            'service_life' => $serviceLife,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_service_life_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ServiceLife $serviceLife, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ServiceLifeType::class, $serviceLife);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_service_life_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('service_life/edit.html.twig', [
            'service_life' => $serviceLife,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_service_life_delete', methods: ['POST'])]
    public function delete(Request $request, ServiceLife $serviceLife, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$serviceLife->getId(), $request->request->get('_token'))) {
            $entityManager->remove($serviceLife);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_service_life_index', [], Response::HTTP_SEE_OTHER);
    }
}
