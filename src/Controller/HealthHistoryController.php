<?php

namespace App\Controller;

use App\Entity\HealthHistory;
use App\Form\HealthHistoryType;
use App\Repository\HealthHistoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/health/history")
 */
class HealthHistoryController extends AbstractController
{
    /**
     * @Route("/", name="app_health_history_index", methods={"GET"})
     */
    public function index(HealthHistoryRepository $healthHistoryRepository): Response
    {
        return $this->render('health_history/index.html.twig', [
            'health_histories' => $healthHistoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_health_history_new", methods={"GET", "POST"})
     */
    public function new(Request $request, HealthHistoryRepository $healthHistoryRepository): Response
    {
        $healthHistory = new HealthHistory();
        $form = $this->createForm(HealthHistoryType::class, $healthHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $healthHistoryRepository->add($healthHistory);
            return $this->redirectToRoute('app_health_history_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('health_history/new.html.twig', [
            'health_history' => $healthHistory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_health_history_show", methods={"GET"})
     */
    public function show(HealthHistory $healthHistory): Response
    {
        return $this->render('health_history/show.html.twig', [
            'health_history' => $healthHistory,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_health_history_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, HealthHistory $healthHistory, HealthHistoryRepository $healthHistoryRepository): Response
    {
        $form = $this->createForm(HealthHistoryType::class, $healthHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $healthHistoryRepository->add($healthHistory);
            return $this->redirectToRoute('app_health_history_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('health_history/edit.html.twig', [
            'health_history' => $healthHistory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_health_history_delete", methods={"POST"})
     */
    public function delete(Request $request, HealthHistory $healthHistory, HealthHistoryRepository $healthHistoryRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$healthHistory->getId(), $request->request->get('_token'))) {
            $healthHistoryRepository->remove($healthHistory);
        }

        return $this->redirectToRoute('app_health_history_index', [], Response::HTTP_SEE_OTHER);
    }
}
