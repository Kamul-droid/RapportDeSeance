<?php

namespace App\Controller;

use App\Entity\ReactionAge;
use App\Form\ReactionAgeType;
use App\Repository\ReactionAgeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reaction")
 */
class ReactionAgeController extends AbstractController
{
    /**
     * @Route("/", name="app_reaction_index", methods={"GET"})
     */
    public function index(ReactionAgeRepository $reactionAgeRepository): Response
    {
        return $this->render('reaction/index.html.twig', [
            'reaction_ages' => $reactionAgeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_reaction_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ReactionAgeRepository $reactionAgeRepository): Response
    {
        $reactionAge = new ReactionAge();
        $form = $this->createForm(ReactionAgeType::class, $reactionAge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reactionAgeRepository->add($reactionAge);
            return $this->redirectToRoute('app_reaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reaction/new.html.twig', [
            'reaction_age' => $reactionAge,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_reaction_show", methods={"GET"})
     */
    public function show(ReactionAge $reactionAge): Response
    {
        return $this->render('reaction/show.html.twig', [
            'reaction_age' => $reactionAge,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_reaction_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ReactionAge $reactionAge, ReactionAgeRepository $reactionAgeRepository): Response
    {
        $form = $this->createForm(ReactionAgeType::class, $reactionAge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reactionAgeRepository->add($reactionAge);
            return $this->redirectToRoute('app_reaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reaction/edit.html.twig', [
            'reaction_age' => $reactionAge,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_reaction_delete", methods={"POST"})
     */
    public function delete(Request $request, ReactionAge $reactionAge, ReactionAgeRepository $reactionAgeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reactionAge->getId(), $request->request->get('_token'))) {
            $reactionAgeRepository->remove($reactionAge);
        }

        return $this->redirectToRoute('app_reaction_index', [], Response::HTTP_SEE_OTHER);
    }
}
