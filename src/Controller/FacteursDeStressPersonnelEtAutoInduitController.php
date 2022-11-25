<?php

namespace App\Controller;

use App\Entity\FacteursDeStressPersonnelEtAutoInduit;
use App\Form\FacteursDeStressPersonnelEtAutoInduitType;
use App\Repository\FacteursDeStressPersonnelEtAutoInduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/facteurs/de/stress/personnel/et/auto/induit")
 */
class FacteursDeStressPersonnelEtAutoInduitController extends AbstractController
{
    /**
     * @Route("/", name="app_facteurs_de_stress_personnel_et_auto_induit_index", methods={"GET"})
     */
    public function index(FacteursDeStressPersonnelEtAutoInduitRepository $facteursDeStressPersonnelEtAutoInduitRepository): Response
    {
        return $this->render('facteurs_de_stress_personnel_et_auto_induit/index.html.twig', [
            'facteurs_de_stress_personnel_et_auto_induits' => $facteursDeStressPersonnelEtAutoInduitRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_facteurs_de_stress_personnel_et_auto_induit_new", methods={"GET", "POST"})
     */
    public function new(Request $request, FacteursDeStressPersonnelEtAutoInduitRepository $facteursDeStressPersonnelEtAutoInduitRepository): Response
    {
        $facteursDeStressPersonnelEtAutoInduit = new FacteursDeStressPersonnelEtAutoInduit();
        $form = $this->createForm(FacteursDeStressPersonnelEtAutoInduitType::class, $facteursDeStressPersonnelEtAutoInduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $facteursDeStressPersonnelEtAutoInduitRepository->add($facteursDeStressPersonnelEtAutoInduit);
            return $this->redirectToRoute('app_facteurs_de_stress_personnel_et_auto_induit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facteurs_de_stress_personnel_et_auto_induit/new.html.twig', [
            'facteurs_de_stress_personnel_et_auto_induit' => $facteursDeStressPersonnelEtAutoInduit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_facteurs_de_stress_personnel_et_auto_induit_show", methods={"GET"})
     */
    public function show(FacteursDeStressPersonnelEtAutoInduit $facteursDeStressPersonnelEtAutoInduit): Response
    {
        return $this->render('facteurs_de_stress_personnel_et_auto_induit/show.html.twig', [
            'facteurs_de_stress_personnel_et_auto_induit' => $facteursDeStressPersonnelEtAutoInduit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_facteurs_de_stress_personnel_et_auto_induit_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, FacteursDeStressPersonnelEtAutoInduit $facteursDeStressPersonnelEtAutoInduit, FacteursDeStressPersonnelEtAutoInduitRepository $facteursDeStressPersonnelEtAutoInduitRepository): Response
    {
        $form = $this->createForm(FacteursDeStressPersonnelEtAutoInduitType::class, $facteursDeStressPersonnelEtAutoInduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $facteursDeStressPersonnelEtAutoInduitRepository->add($facteursDeStressPersonnelEtAutoInduit);
            return $this->redirectToRoute('app_facteurs_de_stress_personnel_et_auto_induit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facteurs_de_stress_personnel_et_auto_induit/edit.html.twig', [
            'facteurs_de_stress_personnel_et_auto_induit' => $facteursDeStressPersonnelEtAutoInduit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_facteurs_de_stress_personnel_et_auto_induit_delete", methods={"POST"})
     */
    public function delete(Request $request, FacteursDeStressPersonnelEtAutoInduit $facteursDeStressPersonnelEtAutoInduit, FacteursDeStressPersonnelEtAutoInduitRepository $facteursDeStressPersonnelEtAutoInduitRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facteursDeStressPersonnelEtAutoInduit->getId(), $request->request->get('_token'))) {
            $facteursDeStressPersonnelEtAutoInduitRepository->remove($facteursDeStressPersonnelEtAutoInduit);
        }

        return $this->redirectToRoute('app_facteurs_de_stress_personnel_et_auto_induit_index', [], Response::HTTP_SEE_OTHER);
    }
}
