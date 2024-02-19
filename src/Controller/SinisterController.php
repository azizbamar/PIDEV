<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sinister;


class SinisterController extends AbstractController
{
    #[Route('/details/{id}', name: 'sinister_details', methods: ['GET'])]
    public function details($id): Response
    {
        // Fetch the Sinister based on $id
        $sinister = $this->getDoctrine()->getRepository(Sinister::class)->find($id);

        if (!$sinister) {
            // Handle the case where the Sinister with the given $id is not found
            throw $this->createNotFoundException('Sinister not found for id ' . $id);
        }

        // Determine the type of Sinister and render accordingly
        $template = match (true) {
            $sinister instanceof \App\Entity\SinisterVehicle => 'constat/details.html.twig',
            $sinister instanceof \App\Entity\SinisterProperty => 'sinister_property/details.html.twig',
            default => 'sinister/details.html.twig',
        };

        return $this->render($template, [
            'sinister' => $sinister,
        ]);
    }
}
