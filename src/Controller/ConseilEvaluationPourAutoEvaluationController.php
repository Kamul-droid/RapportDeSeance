<?php

namespace App\Controller;

use App\Entity\ConseilEvaluationPourAutoEvaluation;
use App\Form\ConseilEvaluationPourAutoEvaluationType;
use App\Repository\ConseilEvaluationPourAutoEvaluationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/conseil/evaluation/pour/auto/evaluation")
 */
class ConseilEvaluationPourAutoEvaluationController extends AbstractController
{
    /**
     * @Route("/", name="app_conseil_evaluation_pour_auto_evaluation_index", methods={"GET"})
     */
    public function index(ConseilEvaluationPourAutoEvaluationRepository $conseilEvaluationPourAutoEvaluationRepository): Response
    {
        return $this->render('conseil_evaluation_pour_auto_evaluation/index.html.twig', [
            'conseil_evaluation_pour_auto_evaluations' => $conseilEvaluationPourAutoEvaluationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_conseil_evaluation_pour_auto_evaluation_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ConseilEvaluationPourAutoEvaluationRepository $conseilEvaluationPourAutoEvaluationRepository): Response
    {
        $conseilEvaluationPourAutoEvaluation = new ConseilEvaluationPourAutoEvaluation();
        $form = $this->createForm(ConseilEvaluationPourAutoEvaluationType::class, $conseilEvaluationPourAutoEvaluation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $conseilEvaluationPourAutoEvaluationRepository->add($conseilEvaluationPourAutoEvaluation);
            return $this->redirectToRoute('app_conseil_evaluation_pour_auto_evaluation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('conseil_evaluation_pour_auto_evaluation/new.html.twig', [
            'conseil_evaluation_pour_auto_evaluation' => $conseilEvaluationPourAutoEvaluation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_conseil_evaluation_pour_auto_evaluation_show", methods={"GET"})
     */
    public function show(ConseilEvaluationPourAutoEvaluation $conseilEvaluationPourAutoEvaluation): Response
    {
        return $this->render('conseil_evaluation_pour_auto_evaluation/show.html.twig', [
            'conseil_evaluation_pour_auto_evaluation' => $conseilEvaluationPourAutoEvaluation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_conseil_evaluation_pour_auto_evaluation_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ConseilEvaluationPourAutoEvaluation $conseilEvaluationPourAutoEvaluation, ConseilEvaluationPourAutoEvaluationRepository $conseilEvaluationPourAutoEvaluationRepository): Response
    {
        $form = $this->createForm(ConseilEvaluationPourAutoEvaluationType::class, $conseilEvaluationPourAutoEvaluation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $conseilEvaluationPourAutoEvaluationRepository->add($conseilEvaluationPourAutoEvaluation);
            return $this->redirectToRoute('app_conseil_evaluation_pour_auto_evaluation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('conseil_evaluation_pour_auto_evaluation/edit.html.twig', [
            'conseil_evaluation_pour_auto_evaluation' => $conseilEvaluationPourAutoEvaluation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_conseil_evaluation_pour_auto_evaluation_delete", methods={"POST"})
     */
    public function delete(Request $request, ConseilEvaluationPourAutoEvaluation $conseilEvaluationPourAutoEvaluation, ConseilEvaluationPourAutoEvaluationRepository $conseilEvaluationPourAutoEvaluationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$conseilEvaluationPourAutoEvaluation->getId(), $request->request->get('_token'))) {
            $conseilEvaluationPourAutoEvaluationRepository->remove($conseilEvaluationPourAutoEvaluation);
        }

        return $this->redirectToRoute('app_conseil_evaluation_pour_auto_evaluation_index', [], Response::HTTP_SEE_OTHER);
    }
}
