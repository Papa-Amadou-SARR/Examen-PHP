<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Form\CvType;
use App\Repository\CvRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cve')]
class CveController extends AbstractController
{
    #[Route('/', name: 'cve_index', methods: ['GET'])]
    public function index(CvRepository $cvRepository): Response
    {
        return $this->render('cve/index.html.twig', [
            'cvs' => $cvRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'cve_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $cv = new Cv();
        $form = $this->createForm(CvType::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cv);
            $entityManager->flush();

            return $this->redirectToRoute('cve_index');
        }

        return $this->render('cve/new.html.twig', [
            'cv' => $cv,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'cve_show', methods: ['GET'])]
    public function show(Cv $cv): Response
    {
        return $this->render('cve/show.html.twig', [
            'cv' => $cv,
        ]);
    }

    #[Route('/{id}/edit', name: 'cve_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cv $cv): Response
    {
        $form = $this->createForm(CvType::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cve_index');
        }

        return $this->render('cve/edit.html.twig', [
            'cv' => $cv,
            'form' => $form->createView(), 
        ]);
    }

    #[Route('/{id}', name: 'cve_delete', methods: ['POST'])]
    public function delete(Request $request, Cv $cv): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cv->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cv);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cve_index');
    }
}
