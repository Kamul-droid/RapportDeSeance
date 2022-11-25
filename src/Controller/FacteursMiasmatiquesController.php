<?php

namespace App\Controller;

use App\Entity\FacteursMiasmatiques;
use App\Form\FacteursMiasmatiquesType;
use App\Repository\FacteursMiasmatiquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/facteurs/miasmatiques")
 */
class FacteursMiasmatiquesController extends AbstractController
{
    /**
     * @Route("/", name="app_facteurs_miasmatiques_index", methods={"GET"})
     */
    public function index(FacteursMiasmatiquesRepository $facteursMiasmatiquesRepository): Response
    {
        return $this->render('facteurs_miasmatiques/index.html.twig', [
            'facteurs_miasmatiques' => $facteursMiasmatiquesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_facteurs_miasmatiques_new", methods={"GET", "POST"})
     */
    public function new(Request $request, FacteursMiasmatiquesRepository $facteursMiasmatiquesRepository): Response
    {
        $facteursMiasmatique = new FacteursMiasmatiques();
        $form = $this->createForm(FacteursMiasmatiquesType::class, $facteursMiasmatique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $facteursMiasmatiquesRepository->add($facteursMiasmatique);
            return $this->redirectToRoute('app_facteurs_miasmatiques_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facteurs_miasmatiques/new.html.twig', [
            'facteurs_miasmatique' => $facteursMiasmatique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_facteurs_miasmatiques_show", methods={"GET"})
     */
    public function show(FacteursMiasmatiques $facteursMiasmatique): Response
    {
        return $this->render('facteurs_miasmatiques/show.html.twig', [
            'facteurs_miasmatique' => $facteursMiasmatique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_facteurs_miasmatiques_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, FacteursMiasmatiques $facteursMiasmatique, FacteursMiasmatiquesRepository $facteursMiasmatiquesRepository): Response
    {
        $form = $this->createForm(FacteursMiasmatiquesType::class, $facteursMiasmatique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $facteursMiasmatiquesRepository->add($facteursMiasmatique);
            return $this->redirectToRoute('app_facteurs_miasmatiques_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facteurs_miasmatiques/edit.html.twig', [
            'facteurs_miasmatique' => $facteursMiasmatique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_facteurs_miasmatiques_delete", methods={"POST"})
     */
    public function delete(Request $request, FacteursMiasmatiques $facteursMiasmatique, FacteursMiasmatiquesRepository $facteursMiasmatiquesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facteursMiasmatique->getId(), $request->request->get('_token'))) {
            $facteursMiasmatiquesRepository->remove($facteursMiasmatique);
        }

        return $this->redirectToRoute('app_facteurs_miasmatiques_index', [], Response::HTTP_SEE_OTHER);
    }
}
