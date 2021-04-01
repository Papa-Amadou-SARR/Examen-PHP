<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntrepriseController extends AbstractController
{
    #[Route('/entreprise', name: 'entreprise')]
    public function index(): Response
    {
        return $this->render('app/entreprise.html.twig', [
            'controller_name' => 'EntrepriseController',
        ]);
    }
}
