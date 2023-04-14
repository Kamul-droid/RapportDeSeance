<?php

namespace App\Controller;

use App\Entity\life\FacteursDeStressConflictuel;
use App\Form\FacteursDeStressConflictuelType;
use App\Repository\FacteursDeStressConflictuelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/facteurs/de/stress/conflictuel")
 */
class FacteursDeStressConflictuelController extends AbstractController
{
    /**
     * @Route("/", name="app_facteurs_de_stress_conflictuel_index", methods={"GET"})
     */
    public function index(FacteursDeStressConflictuelRepository $facteursDeStressConflictuelRepository): Response
    {
        return $this->render('facteurs_de_stress_conflictuel/index.html.twig', [
            'facteurs_de_stress_conflictuels' => $facteursDeStressConflictuelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_facteurs_de_stress_conflictuel_new", methods={"GET", "POST"})
     */
    public function new(Request $request, FacteursDeStressConflictuelRepository $facteursDeStressConflictuelRepository): Response
    {
        $facteursDeStressConflictuel = new FacteursDeStressConflictuel();
        $form = $this->createForm(FacteursDeStressConflictuelType::class, $facteursDeStressConflictuel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $facteursDeStressConflictuelRepository->add($facteursDeStressConflictuel);
            return $this->redirectToRoute('app_facteurs_de_stress_conflictuel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facteurs_de_stress_conflictuel/new.html.twig', [
            'facteurs_de_stress_conflictuel' => $facteursDeStressConflictuel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_facteurs_de_stress_conflictuel_show", methods={"GET"})
     */
    public function show(FacteursDeStressConflictuel $facteursDeStressConflictuel): Response
    {
        return $this->render('facteurs_de_stress_conflictuel/show.html.twig', [
            'facteurs_de_stress_conflictuel' => $facteursDeStressConflictuel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_facteurs_de_stress_conflictuel_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, FacteursDeStressConflictuel $facteursDeStressConflictuel, FacteursDeStressConflictuelRepository $facteursDeStressConflictuelRepository): Response
    {
        $form = $this->createForm(FacteursDeStressConflictuelType::class, $facteursDeStressConflictuel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $facteursDeStressConflictuelRepository->add($facteursDeStressConflictuel);
            return $this->redirectToRoute('app_facteurs_de_stress_conflictuel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facteurs_de_stress_conflictuel/edit.html.twig', [
            'facteurs_de_stress_conflictuel' => $facteursDeStressConflictuel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_facteurs_de_stress_conflictuel_delete", methods={"POST"})
     */
    public function delete(Request $request, FacteursDeStressConflictuel $facteursDeStressConflictuel, FacteursDeStressConflictuelRepository $facteursDeStressConflictuelRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facteursDeStressConflictuel->getId(), $request->request->get('_token'))) {
            $facteursDeStressConflictuelRepository->remove($facteursDeStressConflictuel);
        }

        return $this->redirectToRoute('app_facteurs_de_stress_conflictuel_index', [], Response::HTTP_SEE_OTHER);
    }
}
