<?php

namespace App\Controller;
use App\Entity\PropretyRequest;
use App\Entity\ContratHabitat;
use App\Form\ContratHabitatType;
use App\Repository\ContratHabitatRepository;
use App\Repository\PropretyRequestRepository;
use App\Service\PdfService;
use App\Service\TwilioService;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

#[Route('/contrat/habitat')]
class ContratHabitatController extends AbstractController
{
    private $twilioService;


        public function __construct(TwilioService $twilioService)
        {
            $this->twilioService = $twilioService;
        }

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
                          public function showDemandes_habitat(PaginatorInterface $paginator, PropretyRequestRepository $propretyRequestRepository,  Request $request): Response
                          {
                          $pagination = $paginator->paginate(
                                                         $propretyRequestRepository->findAll(),
                                                         $request->query->getInt('page', 1), // Get the page number from the request
                                                         5 // Number of items per page
                                                     );
                                          return $this->render('contrat_habitat/showDemandes.html.twig', [
                                              'proprety_requests' => $pagination,
                                          ]);

                          }
 #[Route('/{id}/New_ContratHabitat', name: 'app_contrat_habitat_newId', methods: ['GET', 'POST'])]
    public function newId(FlashyNotifier $flashy, Request $request, EntityManagerInterface $entityManager, PropretyRequestRepository $propretyRequestRepository,$id): Response
    {
        $contratHabitat = new ContratHabitat();
        $form = $this->createForm(ContratHabitatType::class, $contratHabitat);
        $form->handleRequest($request);
        $data= $propretyRequestRepository->find($id) ;
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contratHabitat);
            $entityManager->flush();
                        $flashy->success('save !');

            $demande = $contratHabitat->getRequest();

                        if ($demande) {
                            $demande->setStatus('Accepter');
                            $entityManager->flush();
                        }

                // Send the SMS
                //$this->twilioService->sendSms(
                   // '+21652021389',
                   // 'Votre contrat est pret. Veuillez terminer la procédure du paiement'
                //);
            return $this->redirectToRoute('app_contrat_habitat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contrat_habitat/new.html.twig', [
            'contrat_habitat' => $contratHabitat,
            'form' => $form,
            'propertyRequest'=> $data,
        ]);
    }
    #[Route('/pdf/{id}', name: 'contrat_habitat.pdf')]
    public function generatePdfPersonne(ContratHabitat $contratHabitat = null, PdfService $pdf) {
        $html = $this->render('contrat_habitat/showPdf.html.twig', ['contrat_habitat' => $contratHabitat]);
        $pdf->showPdfFile($html);
        return new RedirectResponse($this->generateUrl('app_contrat_habitat_show', ['id' => $contratHabitat->getId()]));

    }


    #[Route('/refuser-demande-habitat/{id}', name: 'refuser_demande_habitat')]
    public function refuserDemande($id, EntityManagerInterface $entityManager, PropretyRequestRepository $propretyRequestRepository): Response
    {
        $demande = $propretyRequestRepository->find($id);

        if (!$demande) {
            throw $this->createNotFoundException('Demande non trouvée');
        }

        $demande->setStatus('Refusée');
        $entityManager->flush();

            return $this->redirectToRoute('app_contrat_habitat_show_in_contrat', [], Response::HTTP_SEE_OTHER);
    }
}

