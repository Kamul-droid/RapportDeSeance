<?php

namespace App\Controller;

use App\Entity\FacteursDeStressEmotionnel;
use App\Form\FacteursDeStressEmotionnelType;
use App\Repository\FacteursDeStressEmotionnelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/facteurs/de/stress/emotionnel")
 */
class FacteursDeStressEmotionnelController extends AbstractController
{
    /**
     * @Route("/", name="app_facteurs_de_stress_emotionnel_index", methods={"GET"})
     */
    public function index(FacteursDeStressEmotionnelRepository $facteursDeStressEmotionnelRepository): Response
    {
        return $this->render('facteurs_de_stress_emotionnel/index.html.twig', [
            'facteurs_de_stress_emotionnels' => $facteursDeStressEmotionnelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_facteurs_de_stress_emotionnel_new", methods={"GET", "POST"})
     */
    public function new(Request $request, FacteursDeStressEmotionnelRepository $facteursDeStressEmotionnelRepository): Response
    {
        $facteursDeStressEmotionnel = new FacteursDeStressEmotionnel();
        $form = $this->createForm(FacteursDeStressEmotionnelType::class, $facteursDeStressEmotionnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $facteursDeStressEmotionnelRepository->add($facteursDeStressEmotionnel);
            return $this->redirectToRoute('app_facteurs_de_stress_emotionnel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facteurs_de_stress_emotionnel/new.html.twig', [
            'facteurs_de_stress_emotionnel' => $facteursDeStressEmotionnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_facteurs_de_stress_emotionnel_show", methods={"GET"})
     */
    public function show(FacteursDeStressEmotionnel $facteursDeStressEmotionnel): Response
    {
        return $this->render('facteurs_de_stress_emotionnel/show.html.twig', [
            'facteurs_de_stress_emotionnel' => $facteursDeStressEmotionnel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_facteurs_de_stress_emotionnel_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, FacteursDeStressEmotionnel $facteursDeStressEmotionnel, FacteursDeStressEmotionnelRepository $facteursDeStressEmotionnelRepository): Response
    {
        $form = $this->createForm(FacteursDeStressEmotionnelType::class, $facteursDeStressEmotionnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $facteursDeStressEmotionnelRepository->add($facteursDeStressEmotionnel);
            return $this->redirectToRoute('app_facteurs_de_stress_emotionnel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('facteurs_de_stress_emotionnel/edit.html.twig', [
            'facteurs_de_stress_emotionnel' => $facteursDeStressEmotionnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_facteurs_de_stress_emotionnel_delete", methods={"POST"})
     */
    public function delete(Request $request, FacteursDeStressEmotionnel $facteursDeStressEmotionnel, FacteursDeStressEmotionnelRepository $facteursDeStressEmotionnelRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facteursDeStressEmotionnel->getId(), $request->request->get('_token'))) {
            $facteursDeStressEmotionnelRepository->remove($facteursDeStressEmotionnel);
        }

        return $this->redirectToRoute('app_facteurs_de_stress_emotionnel_index', [], Response::HTTP_SEE_OTHER);
    }
}
