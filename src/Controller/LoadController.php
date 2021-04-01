<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoadController extends AbstractController
{
    #[Route('/load', name: 'load')]
    public function index(): Response
    {
        return $this->render('app/load.html.twig', [
            'controller_name' => 'LoadController',
        ]);
    }
}
