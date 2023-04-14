<?php

namespace App\Controller;

use App\Entity\life\ChoixDeVoies;
use App\Form\ChoixDeVoiesType;
use App\Repository\ChoixDeVoiesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/choix/de/voies")
 */
class ChoixDeVoiesController extends AbstractController
{
    /**
     * @Route("/", name="app_choix_de_voies_index", methods={"GET"})
     */
    public function index(ChoixDeVoiesRepository $choixDeVoiesRepository): Response
    {
        return $this->render('choix_de_voies/index.html.twig', [
            'choix_de_voies' => $choixDeVoiesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_choix_de_voies_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ChoixDeVoiesRepository $choixDeVoiesRepository): Response
    {
        $choixDeVoie = new ChoixDeVoies();
        $form = $this->createForm(ChoixDeVoiesType::class, $choixDeVoie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $choixDeVoiesRepository->add($choixDeVoie);
            return $this->redirectToRoute('app_choix_de_voies_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('choix_de_voies/new.html.twig', [
            'choix_de_voie' => $choixDeVoie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_choix_de_voies_show", methods={"GET"})
     */
    public function show(ChoixDeVoies $choixDeVoie): Response
    {
        return $this->render('choix_de_voies/show.html.twig', [
            'choix_de_voie' => $choixDeVoie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_choix_de_voies_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ChoixDeVoies $choixDeVoie, ChoixDeVoiesRepository $choixDeVoiesRepository): Response
    {
        $form = $this->createForm(ChoixDeVoiesType::class, $choixDeVoie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $choixDeVoiesRepository->add($choixDeVoie);
            return $this->redirectToRoute('app_choix_de_voies_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('choix_de_voies/edit.html.twig', [
            'choix_de_voie' => $choixDeVoie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_choix_de_voies_delete", methods={"POST"})
     */
    public function delete(Request $request, ChoixDeVoies $choixDeVoie, ChoixDeVoiesRepository $choixDeVoiesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$choixDeVoie->getId(), $request->request->get('_token'))) {
            $choixDeVoiesRepository->remove($choixDeVoie);
        }

        return $this->redirectToRoute('app_choix_de_voies_index', [], Response::HTTP_SEE_OTHER);
    }
}
