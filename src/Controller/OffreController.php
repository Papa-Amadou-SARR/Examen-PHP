<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OffreController extends AbstractController
{
    #[Route('/offre', name: 'offre')]
    public function index(): Response
    {
        return $this->render('app/offre.html.twig', [
            'controller_name' => 'OffreController',
        ]);
    }
}
