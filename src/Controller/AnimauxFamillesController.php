<?php

namespace App\Controller;

use App\Entity\AnimauxFamilles;
use App\Form\AnimauxFamillesType;
use App\Repository\AnimauxFamillesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/animaux/familles")
 */
class AnimauxFamillesController extends AbstractController
{
    /**
     * @Route("/", name="app_animaux_familles_index", methods={"GET"})
     */
    public function index(AnimauxFamillesRepository $animauxFamillesRepository): Response
    {
        return $this->render('animaux_familles/index.html.twig', [
            'animaux_familles' => $animauxFamillesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_animaux_familles_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AnimauxFamillesRepository $animauxFamillesRepository): Response
    {
        $animauxFamille = new AnimauxFamilles();
        $form = $this->createForm(AnimauxFamillesType::class, $animauxFamille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $animauxFamillesRepository->add($animauxFamille);
            return $this->redirectToRoute('app_animaux_familles_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('animaux_familles/new.html.twig', [
            'animaux_famille' => $animauxFamille,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_animaux_familles_show", methods={"GET"})
     */
    public function show(AnimauxFamilles $animauxFamille): Response
    {
        return $this->render('animaux_familles/show.html.twig', [
            'animaux_famille' => $animauxFamille,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_animaux_familles_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, AnimauxFamilles $animauxFamille, AnimauxFamillesRepository $animauxFamillesRepository): Response
    {
        $form = $this->createForm(AnimauxFamillesType::class, $animauxFamille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $animauxFamillesRepository->add($animauxFamille);
            return $this->redirectToRoute('app_animaux_familles_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('animaux_familles/edit.html.twig', [
            'animaux_famille' => $animauxFamille,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_animaux_familles_delete", methods={"POST"})
     */
    public function delete(Request $request, AnimauxFamilles $animauxFamille, AnimauxFamillesRepository $animauxFamillesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$animauxFamille->getId(), $request->request->get('_token'))) {
            $animauxFamillesRepository->remove($animauxFamille);
        }

        return $this->redirectToRoute('app_animaux_familles_index', [], Response::HTTP_SEE_OTHER);
    }
}
