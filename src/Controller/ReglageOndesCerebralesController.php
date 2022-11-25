<?php

namespace App\Controller;

use App\Entity\ReglageOndesCerebrales;
use App\Form\ReglageOndesCerebralesType;
use App\Repository\ReglageOndesCerebralesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reglage/ondes/cerebrales")
 */
class ReglageOndesCerebralesController extends AbstractController
{
    /**
     * @Route("/", name="app_reglage_ondes_cerebrales_index", methods={"GET"})
     */
    public function index(ReglageOndesCerebralesRepository $reglageOndesCerebralesRepository): Response
    {
        return $this->render('reglage_ondes_cerebrales/index.html.twig', [
            'reglage_ondes_cerebrales' => $reglageOndesCerebralesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_reglage_ondes_cerebrales_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ReglageOndesCerebralesRepository $reglageOndesCerebralesRepository): Response
    {
        $reglageOndesCerebrale = new ReglageOndesCerebrales();
        $form = $this->createForm(ReglageOndesCerebralesType::class, $reglageOndesCerebrale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reglageOndesCerebralesRepository->add($reglageOndesCerebrale);
            return $this->redirectToRoute('app_reglage_ondes_cerebrales_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reglage_ondes_cerebrales/new.html.twig', [
            'reglage_ondes_cerebrale' => $reglageOndesCerebrale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_reglage_ondes_cerebrales_show", methods={"GET"})
     */
    public function show(ReglageOndesCerebrales $reglageOndesCerebrale): Response
    {
        return $this->render('reglage_ondes_cerebrales/show.html.twig', [
            'reglage_ondes_cerebrale' => $reglageOndesCerebrale,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_reglage_ondes_cerebrales_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ReglageOndesCerebrales $reglageOndesCerebrale, ReglageOndesCerebralesRepository $reglageOndesCerebralesRepository): Response
    {
        $form = $this->createForm(ReglageOndesCerebralesType::class, $reglageOndesCerebrale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reglageOndesCerebralesRepository->add($reglageOndesCerebrale);
            return $this->redirectToRoute('app_reglage_ondes_cerebrales_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reglage_ondes_cerebrales/edit.html.twig', [
            'reglage_ondes_cerebrale' => $reglageOndesCerebrale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_reglage_ondes_cerebrales_delete", methods={"POST"})
     */
    public function delete(Request $request, ReglageOndesCerebrales $reglageOndesCerebrale, ReglageOndesCerebralesRepository $reglageOndesCerebralesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reglageOndesCerebrale->getId(), $request->request->get('_token'))) {
            $reglageOndesCerebralesRepository->remove($reglageOndesCerebrale);
        }

        return $this->redirectToRoute('app_reglage_ondes_cerebrales_index', [], Response::HTTP_SEE_OTHER);
    }
}
