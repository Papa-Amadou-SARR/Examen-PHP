<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    #[Route('/form', name: 'form')]
    public function index(): Response
    {
        return $this->render('app/form.html.twig', [
            'controller_name' => 'FormController',
        ]);
    }
}
