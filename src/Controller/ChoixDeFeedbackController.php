<?php

namespace App\Controller;

use App\Entity\ChoixDeFeedback;
use App\Form\ChoixDeFeedbackType;
use App\Repository\ChoixDeFeedbackRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/choix/de/feedback")
 */
class ChoixDeFeedbackController extends AbstractController
{
    /**
     * @Route("/", name="app_choix_de_feedback_index", methods={"GET"})
     */
    public function index(ChoixDeFeedbackRepository $choixDeFeedbackRepository): Response
    {
        return $this->render('choix_de_feedback/index.html.twig', [
            'choix_de_feedbacks' => $choixDeFeedbackRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_choix_de_feedback_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ChoixDeFeedbackRepository $choixDeFeedbackRepository): Response
    {
        $choixDeFeedback = new ChoixDeFeedback();
        $form = $this->createForm(ChoixDeFeedbackType::class, $choixDeFeedback);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $choixDeFeedbackRepository->add($choixDeFeedback);
            return $this->redirectToRoute('app_choix_de_feedback_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('choix_de_feedback/new.html.twig', [
            'choix_de_feedback' => $choixDeFeedback,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_choix_de_feedback_show", methods={"GET"})
     */
    public function show(ChoixDeFeedback $choixDeFeedback): Response
    {
        return $this->render('choix_de_feedback/show.html.twig', [
            'choix_de_feedback' => $choixDeFeedback,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_choix_de_feedback_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ChoixDeFeedback $choixDeFeedback, ChoixDeFeedbackRepository $choixDeFeedbackRepository): Response
    {
        $form = $this->createForm(ChoixDeFeedbackType::class, $choixDeFeedback);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $choixDeFeedbackRepository->add($choixDeFeedback);
            return $this->redirectToRoute('app_choix_de_feedback_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('choix_de_feedback/edit.html.twig', [
            'choix_de_feedback' => $choixDeFeedback,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_choix_de_feedback_delete", methods={"POST"})
     */
    public function delete(Request $request, ChoixDeFeedback $choixDeFeedback, ChoixDeFeedbackRepository $choixDeFeedbackRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$choixDeFeedback->getId(), $request->request->get('_token'))) {
            $choixDeFeedbackRepository->remove($choixDeFeedback);
        }

        return $this->redirectToRoute('app_choix_de_feedback_index', [], Response::HTTP_SEE_OTHER);
    }
}
