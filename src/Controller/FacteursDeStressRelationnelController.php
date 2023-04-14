<?php

namespace App\Controller;

use App\Entity\life\FacteursDeStressRelationnel;
use App\Form\FacteursDeStressRelationnelType;
use App\Repository\FacteursDeStressRelationnelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/facteurs/de/stress/relationnel")
 */
class FacteursDeStressRelationnelController extends AbstractController
{
    /**
     * @Route("/", name="app_facteurs_de_stress_relationnel_index", methods={"GET"})
     */
    public function index(FacteursDeStressRelationnelRepository $facteursDeStressRelationnelRepository): Response
    {
        return $this->render('facteurs_de_stress_relationnel/index.html.twig', [
            'facteurs_de_stress_relationnels' => $facteursDeStressRelationnelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_facteurs_de_stress_relationnel_new", methods={"GET", "POST"})
     */
    public function new(Request $request, FacteursDeStressRelationnelRepository $facteursDeStressRelationnelRepository): Response
    {
        $facteursDeStressRelationnel = new FacteursDeStressRelationnel();
        $form = $this->createForm(FacteursDeStressRelationnelType::class, $facteursDeStressRelationnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $facteursDeStressRelationnelRepository->add($facteursDeStressRelationnel);
            return $this->redirectToRoute('app_facteurs_de_stress_relationnel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facteurs_de_stress_relationnel/new.html.twig', [
            'facteurs_de_stress_relationnel' => $facteursDeStressRelationnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_facteurs_de_stress_relationnel_show", methods={"GET"})
     */
    public function show(FacteursDeStressRelationnel $facteursDeStressRelationnel): Response
    {
        return $this->render('facteurs_de_stress_relationnel/show.html.twig', [
            'facteurs_de_stress_relationnel' => $facteursDeStressRelationnel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_facteurs_de_stress_relationnel_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, FacteursDeStressRelationnel $facteursDeStressRelationnel, FacteursDeStressRelationnelRepository $facteursDeStressRelationnelRepository): Response
    {
        $form = $this->createForm(FacteursDeStressRelationnelType::class, $facteursDeStressRelationnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $facteursDeStressRelationnelRepository->add($facteursDeStressRelationnel);
            return $this->redirectToRoute('app_facteurs_de_stress_relationnel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facteurs_de_stress_relationnel/edit.html.twig', [
            'facteurs_de_stress_relationnel' => $facteursDeStressRelationnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_facteurs_de_stress_relationnel_delete", methods={"POST"})
     */
    public function delete(Request $request, FacteursDeStressRelationnel $facteursDeStressRelationnel, FacteursDeStressRelationnelRepository $facteursDeStressRelationnelRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facteursDeStressRelationnel->getId(), $request->request->get('_token'))) {
            $facteursDeStressRelationnelRepository->remove($facteursDeStressRelationnel);
        }

        return $this->redirectToRoute('app_facteurs_de_stress_relationnel_index', [], Response::HTTP_SEE_OTHER);
    }
}
