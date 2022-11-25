<?php

namespace App\Controller;

use App\Entity\Vitamines;
use App\Form\VitaminesType;
use App\Repository\VitaminesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vitamines")
 */
class VitaminesController extends AbstractController
{
    /**
     * @Route("/", name="app_vitamines_index", methods={"GET"})
     */
    public function index(VitaminesRepository $vitaminesRepository): Response
    {
        return $this->render('vitamines/index.html.twig', [
            'vitamines' => $vitaminesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_vitamines_new", methods={"GET", "POST"})
     */
    public function new(Request $request, VitaminesRepository $vitaminesRepository): Response
    {
        $vitamine = new Vitamines();
        $form = $this->createForm(VitaminesType::class, $vitamine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vitaminesRepository->add($vitamine);
            return $this->redirectToRoute('app_vitamines_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('vitamines/new.html.twig', [
            'vitamine' => $vitamine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_vitamines_show", methods={"GET"})
     */
    public function show(Vitamines $vitamine): Response
    {
        return $this->render('vitamines/show.html.twig', [
            'vitamine' => $vitamine,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_vitamines_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Vitamines $vitamine, VitaminesRepository $vitaminesRepository): Response
    {
        $form = $this->createForm(VitaminesType::class, $vitamine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vitaminesRepository->add($vitamine);
            return $this->redirectToRoute('app_vitamines_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('vitamines/edit.html.twig', [
            'vitamine' => $vitamine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_vitamines_delete", methods={"POST"})
     */
    public function delete(Request $request, Vitamines $vitamine, VitaminesRepository $vitaminesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vitamine->getId(), $request->request->get('_token'))) {
            $vitaminesRepository->remove($vitamine);
        }

        return $this->redirectToRoute('app_vitamines_index', [], Response::HTTP_SEE_OTHER);
    }
}
