<?php

namespace App\Controller;

use App\Entity\Feedbacksupplementaire;
use App\Form\FeedbacksupplementaireType;
use App\Repository\FeedbacksupplementaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/feedbacksupplementaire")
 */
class FeedbacksupplementaireController extends AbstractController
{
    /**
     * @Route("/", name="app_feedbacksupplementaire_index", methods={"GET"})
     */
    public function index(FeedbacksupplementaireRepository $feedbacksupplementaireRepository): Response
    {
        return $this->render('feedbacksupplementaire/index.html.twig', [
            'feedbacksupplementaires' => $feedbacksupplementaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_feedbacksupplementaire_new", methods={"GET", "POST"})
     */
    public function new(Request $request, FeedbacksupplementaireRepository $feedbacksupplementaireRepository): Response
    {
        $feedbacksupplementaire = new Feedbacksupplementaire();
        $form = $this->createForm(FeedbacksupplementaireType::class, $feedbacksupplementaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $feedbacksupplementaireRepository->add($feedbacksupplementaire);
            return $this->redirectToRoute('app_feedbacksupplementaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('feedbacksupplementaire/new.html.twig', [
            'feedbacksupplementaire' => $feedbacksupplementaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_feedbacksupplementaire_show", methods={"GET"})
     */
    public function show(Feedbacksupplementaire $feedbacksupplementaire): Response
    {
        return $this->render('feedbacksupplementaire/show.html.twig', [
            'feedbacksupplementaire' => $feedbacksupplementaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_feedbacksupplementaire_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Feedbacksupplementaire $feedbacksupplementaire, FeedbacksupplementaireRepository $feedbacksupplementaireRepository): Response
    {
        $form = $this->createForm(FeedbacksupplementaireType::class, $feedbacksupplementaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $feedbacksupplementaireRepository->add($feedbacksupplementaire);
            return $this->redirectToRoute('app_feedbacksupplementaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('feedbacksupplementaire/edit.html.twig', [
            'feedbacksupplementaire' => $feedbacksupplementaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_feedbacksupplementaire_delete", methods={"POST"})
     */
    public function delete(Request $request, Feedbacksupplementaire $feedbacksupplementaire, FeedbacksupplementaireRepository $feedbacksupplementaireRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$feedbacksupplementaire->getId(), $request->request->get('_token'))) {
            $feedbacksupplementaireRepository->remove($feedbacksupplementaire);
        }

        return $this->redirectToRoute('app_feedbacksupplementaire_index', [], Response::HTTP_SEE_OTHER);
    }
}
