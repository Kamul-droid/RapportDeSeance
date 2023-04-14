<?php

namespace App\Controller;

use App\Entity\life\FacteursDeStress;
use App\Form\FacteursDeStressType;
use App\Repository\FacteursDeStressRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/facteurs/de/stress")
 */
class FacteursDeStressController extends AbstractController
{
    /**
     * @Route("/", name="app_facteurs_de_stress_index", methods={"GET"})
     */
    public function index(FacteursDeStressRepository $facteursDeStressRepository): Response
    {
        return $this->render('facteurs_de_stress/index.html.twig', [
            'facteurs_de_stresses' => $facteursDeStressRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_facteurs_de_stress_new", methods={"GET", "POST"})
     */
    public function new(Request $request, FacteursDeStressRepository $facteursDeStressRepository): Response
    {
        $facteursDeStress = new FacteursDeStress();
        $form = $this->createForm(FacteursDeStressType::class, $facteursDeStress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $facteursDeStressRepository->add($facteursDeStress);
            return $this->redirectToRoute('app_facteurs_de_stress_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facteurs_de_stress/new.html.twig', [
            'facteurs_de_stress' => $facteursDeStress,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_facteurs_de_stress_show", methods={"GET"})
     */
    public function show(FacteursDeStress $facteursDeStress): Response
    {
        return $this->render('facteurs_de_stress/show.html.twig', [
            'facteurs_de_stress' => $facteursDeStress,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_facteurs_de_stress_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, FacteursDeStress $facteursDeStress, FacteursDeStressRepository $facteursDeStressRepository): Response
    {
        $form = $this->createForm(FacteursDeStressType::class, $facteursDeStress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $facteursDeStressRepository->add($facteursDeStress);
            return $this->redirectToRoute('app_facteurs_de_stress_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facteurs_de_stress/edit.html.twig', [
            'facteurs_de_stress' => $facteursDeStress,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_facteurs_de_stress_delete", methods={"POST"})
     */
    public function delete(Request $request, FacteursDeStress $facteursDeStress, FacteursDeStressRepository $facteursDeStressRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facteursDeStress->getId(), $request->request->get('_token'))) {
            $facteursDeStressRepository->remove($facteursDeStress);
        }

        return $this->redirectToRoute('app_facteurs_de_stress_index', [], Response::HTTP_SEE_OTHER);
    }
}
