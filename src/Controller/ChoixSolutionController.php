<?php

namespace App\Controller;

use App\Entity\life\ChoixSolution;
use App\Form\ChoixSolutionType;
use App\Repository\ChoixSolutionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/choix/solution")
 */
class ChoixSolutionController extends AbstractController
{
    /**
     * @Route("/", name="app_choix_solution_index", methods={"GET"})
     */
    public function index(ChoixSolutionRepository $choixSolutionRepository): Response
    {
        return $this->render('choix_solution/index.html.twig', [
            'choix_solutions' => $choixSolutionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_choix_solution_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ChoixSolutionRepository $choixSolutionRepository): Response
    {
        $choixSolution = new ChoixSolution();
        $form = $this->createForm(ChoixSolutionType::class, $choixSolution);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $choixSolutionRepository->add($choixSolution);
            return $this->redirectToRoute('app_choix_solution_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('choix_solution/new.html.twig', [
            'choix_solution' => $choixSolution,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_choix_solution_show", methods={"GET"})
     */
    public function show(ChoixSolution $choixSolution): Response
    {
        return $this->render('choix_solution/show.html.twig', [
            'choix_solution' => $choixSolution,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_choix_solution_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ChoixSolution $choixSolution, ChoixSolutionRepository $choixSolutionRepository): Response
    {
        $form = $this->createForm(ChoixSolutionType::class, $choixSolution);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $choixSolutionRepository->add($choixSolution);
            return $this->redirectToRoute('app_choix_solution_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('choix_solution/edit.html.twig', [
            'choix_solution' => $choixSolution,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_choix_solution_delete", methods={"POST"})
     */
    public function delete(Request $request, ChoixSolution $choixSolution, ChoixSolutionRepository $choixSolutionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$choixSolution->getId(), $request->request->get('_token'))) {
            $choixSolutionRepository->remove($choixSolution);
        }

        return $this->redirectToRoute('app_choix_solution_index', [], Response::HTTP_SEE_OTHER);
    }
}
