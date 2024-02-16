<?php

namespace App\Controller;

use App\Entity\Reclamation;
use App\Form\ReclamationType;
use App\Repository\ReclamationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

#[Route('/reclamation')]
class ReclamationController extends AbstractController
{
    #[Route('/', name: 'app_reclamation_index', methods: ['GET'])]
    public function index(ReclamationRepository $reclamationRepository): Response
{
    $reclamations = $reclamationRepository->findAll();
    $reclamationsWithUserCin = [];

    // Adjust the loop to add 'cin' to each reclamation row
    foreach ($reclamations as $reclamation) {
        $userCin = $reclamation->getUser()->getCin();
        $reclamationsWithUserCin[] = [
            'reclamation' => $reclamation,
            'userCin' => $userCin,
        ];
    }

    return $this->render('reclamation/index.html.twig', [
        'reclamationsWithUserCin' => $reclamationsWithUserCin,
    ]);
}
    #[Route('/new', name: 'app_reclamation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reclamation = new Reclamation();
        $reclamation->setDateReclamation(new \DateTime());

        $user = $this->getUser(); // Use $this->getUser() to get the authenticated user
    
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);
    
        if ($user instanceof \App\Entity\User) {
            // Assuming your User entity has a method getId()
            
    
            // Redirect to the 'app_reclamation_index' route with the user ID as a query parameter
            if ($form->isSubmitted() && $form->isValid()) {
                $reclamation->setUser($user);
                $entityManager->persist($reclamation);
                $entityManager->flush();
    
                return $this->redirectToRoute('app_reclamation_show', [], Response::HTTP_SEE_OTHER);
            }
        }
    
        return $this->renderForm('reclamation/new.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form,
        ]);
    }

    #[Route('/userReclamation', name: 'app_reclamation_show')]
    public function show(EntityManagerInterface $entityManager): Response
    {
        // Get the currently logged-in user
        $user = $this->getUser();
        if ($user instanceof \App\Entity\User) {
            $reclamations = $entityManager->createQueryBuilder()
            ->select('r.id', 'r.title', 'r.description','r.dateReclamation') // Include only the necessary fields
            ->from('App\Entity\Reclamation', 'r')
            ->where('r.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();

        }
        // Assuming there's a property or method in the User entity that represents the reclamations
    
        return $this->render('reclamation/show.html.twig', [
            'reclamations' => $reclamations,
        ]);
    }
    
    #[Route('/{id}', name: 'reclamation', methods: ['GET'])]
    public function getUserReclamation(Reclamation $reclamation): Response
    {
        return $this->render('reclamation/showreclamation.html.twig', [
            'reclamation' => $reclamation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reclamation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reclamation $reclamation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reclamation/edit.html.twig', [
            'reclamation' => $reclamation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reclamation_delete', methods: ['POST'])]
    public function delete(Request $request, Reclamation $reclamation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reclamation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($reclamation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reclamation_index', [], Response::HTTP_SEE_OTHER);
    }
}
