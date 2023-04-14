<?php

namespace App\Controller;

use App\Entity\life\FacteursGeneraux;
use App\Form\FacteursGenerauxType;
use App\Repository\FacteursGenerauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/facteurs/generaux")
 */
class FacteursGenerauxController extends AbstractController
{
    /**
     * @Route("/", name="app_facteurs_generaux_index", methods={"GET"})
     */
    public function index(FacteursGenerauxRepository $facteursGenerauxRepository): Response
    {
        return $this->render('facteurs_generaux/index.html.twig', [
            'facteurs_generauxes' => $facteursGenerauxRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_facteurs_generaux_new", methods={"GET", "POST"})
     */
    public function new(Request $request, FacteursGenerauxRepository $facteursGenerauxRepository): Response
    {
        $facteursGeneraux = new FacteursGeneraux();
        $form = $this->createForm(FacteursGenerauxType::class, $facteursGeneraux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $facteursGenerauxRepository->add($facteursGeneraux);
            return $this->redirectToRoute('app_facteurs_generaux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facteurs_generaux/new.html.twig', [
            'facteurs_generaux' => $facteursGeneraux,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_facteurs_generaux_show", methods={"GET"})
     */
    public function show(FacteursGeneraux $facteursGeneraux): Response
    {
        return $this->render('facteurs_generaux/show.html.twig', [
            'facteurs_generaux' => $facteursGeneraux,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_facteurs_generaux_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, FacteursGeneraux $facteursGeneraux, FacteursGenerauxRepository $facteursGenerauxRepository): Response
    {
        $form = $this->createForm(FacteursGenerauxType::class, $facteursGeneraux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $facteursGenerauxRepository->add($facteursGeneraux);
            return $this->redirectToRoute('app_facteurs_generaux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facteurs_generaux/edit.html.twig', [
            'facteurs_generaux' => $facteursGeneraux,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_facteurs_generaux_delete", methods={"POST"})
     */
    public function delete(Request $request, FacteursGeneraux $facteursGeneraux, FacteursGenerauxRepository $facteursGenerauxRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facteursGeneraux->getId(), $request->request->get('_token'))) {
            $facteursGenerauxRepository->remove($facteursGeneraux);
        }

        return $this->redirectToRoute('app_facteurs_generaux_index', [], Response::HTTP_SEE_OTHER);
    }
}
