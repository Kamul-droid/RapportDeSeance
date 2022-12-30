<?php

namespace App\Controller;

use App\Entity\GlobalState;
use App\Form\GlobalStateType;
use App\Repository\GlobalStateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/global/state")
 */
class GlobalStateController extends AbstractController
{
    /**
     * @Route("/", name="app_global_state_index", methods={"GET"})
     */
    public function index(GlobalStateRepository $globalStateRepository): Response
    {
        return $this->render('global_state/index.html.twig', [
            'global_states' => $globalStateRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_global_state_new", methods={"GET", "POST"})
     */
    public function new(Request $request, GlobalStateRepository $globalStateRepository): Response
    {
        $globalState = new GlobalState();
        $form = $this->createForm(GlobalStateType::class, $globalState);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $globalStateRepository->add($globalState);
            return $this->redirectToRoute('app_global_state_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('global_state/new.html.twig', [
            'global_state' => $globalState,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_global_state_show", methods={"GET"})
     */
    public function show(GlobalState $globalState): Response
    {
        return $this->render('global_state/show.html.twig', [
            'global_state' => $globalState,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_global_state_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, GlobalState $globalState, GlobalStateRepository $globalStateRepository): Response
    {
        $form = $this->createForm(GlobalStateType::class, $globalState);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $globalStateRepository->add($globalState);
            return $this->redirectToRoute('app_global_state_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('global_state/edit.html.twig', [
            'global_state' => $globalState,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_global_state_delete", methods={"POST"})
     */
    public function delete(Request $request, GlobalState $globalState, GlobalStateRepository $globalStateRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$globalState->getId(), $request->request->get('_token'))) {
            $globalStateRepository->remove($globalState);
        }

        return $this->redirectToRoute('app_global_state_index', [], Response::HTTP_SEE_OTHER);
    }
}
