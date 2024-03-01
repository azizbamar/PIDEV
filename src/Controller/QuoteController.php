<?php

namespace App\Controller;
use App\Repository\QuestionRepository;
use App\Repository\ServiceRepository;
use App\Entity\Quote;
use App\Form\QuoteType;
use App\Repository\QuoteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Dompdf\Dompdf;
use Dompdf\Options;

#[Route('/quote')]
class QuoteController extends AbstractController
{
    #[Route('/', name: 'app_quote_index', methods: ['GET'])]
    public function index(QuoteRepository $quoteRepository): Response
    {
        return $this->render('quote/index.html.twig', [
            'quotes' => $quoteRepository->findAll(),
        ]);
    }

    #[Route('/myquotes/{id}', name: 'app_user_quote_index', methods: ['GET'])]
    public function indexUser($id,QuoteRepository $quoteRepository,UserRepository $userRepository): Response
    {
        return $this->render('quote/index.html.twig', [
            'quotes' => $userRepository->find($id)->getQuotes(),
        ]);
    }

    #[Route('/new', name: 'app_quote_new', methods: ['GET', 'POST'])]
    public function newQuote(Request $request, EntityManagerInterface $entityManager): Response
    {
        $quote = new Quote();
        $form = $this->createForm(QuoteType::class, $quote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($quote);
            $entityManager->flush();

            return $this->redirectToRoute('app_quote_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('quote/new.html.twig', [
            'quote' => $quote,
            'form' => $form,
        ]);
    }
    #[Route('/new/{type}', name: 'app_quote_new_type', methods: ['GET', 'POST'])]
    public function newQuoteType($type,Request $request, EntityManagerInterface $entityManager,QuestionRepository $questionRepository,ServiceRepository $serviceRepository,UserRepository $userRepository): Response
    {
        $questions = $questionRepository->findByType($type);
        $quote = new Quote();
        $form = $this->createForm(QuoteType::class, $quote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $selectedServices = json_decode($request->request->get('selectedServices'), true);
            $amount=1;
            $services = [];
            foreach ($selectedServices as $service) {
                $price = $serviceRepository->find($service)->getPrice();
                $amount = $amount * $price;
                array_push($services, $serviceRepository->find($service)->getName());
            }
            $quote->setUser($userRepository->find(1));
            $quote->setType($type);
            $quote->setServices($services);
            $quote->setAmount($amount);
            $entityManager->persist($quote);
            $entityManager->flush();

            return $this->redirectToRoute('app_user_quote_index', ['id' => 1]);
        }

        return $this->renderForm('quote/newtype.html.twig', [
            'quote' => $quote,
            'form' => $form,
            'questions' => $questions,
        ]);
    }

    #[Route('/{id}', name: 'app_quote_show', methods: ['GET'])]
    public function show(Quote $quote): Response
    {
        return $this->render('quote/show.html.twig', [
            'quote' => $quote,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_quote_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Quote $quote, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(QuoteType::class, $quote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_quote_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('quote/edit.html.twig', [
            'quote' => $quote,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_quote_delete', methods: ['POST'])]
    public function delete(Request $request, Quote $quote, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$quote->getId(), $request->request->get('_token'))) {
            $entityManager->remove($quote);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_quote_index', [], Response::HTTP_SEE_OTHER);
    }



    
    #[Route('/print/{id}', name: 'app_quote_print')]
    public function print($id,QuoteRepository $quoteRepository):void
    {
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont','Arial');
        $pdfOptions->setIsRemoteEnabled(true);
        $pdfOptions->set('isHtml5ParserEnabled',true);
        $dompdf = new Dompdf($pdfOptions);
        $date = date("Y/m/d");
        $quote = $quoteRepository->find($id);
        $html = $this->renderView('quote/print.html.twig',[
            'id' => $id,
            'date' => $date,
            'quote' => $quote
        ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser (force download)
        $dompdf->stream('devis.pdf',["Attachment" => true]);    

     
    }


    
}
