<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresController extends AbstractController
{
    #[Route('/pres', name: 'pres')]
    public function index(): Response
    {
        return $this->render('app/pres.html.twig', [
            'controller_name' => 'PresController',
        ]);
    }
}
