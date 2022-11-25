<?php

namespace App\Controller;

use App\Entity\EquilibreHarmoniqueCerveauGaucheCerveauDroit;
use App\Form\EquilibreHarmoniqueCerveauGaucheCerveauDroitType;
use App\Repository\EquilibreHarmoniqueCerveauGaucheCerveauDroitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/equilibre/harmonique/cerveau/gauche/cerveau/droit")
 */
class EquilibreHarmoniqueCerveauGaucheCerveauDroitController extends AbstractController
{
    /**
     * @Route("/", name="app_equilibre_harmonique_cerveau_gauche_cerveau_droit_index", methods={"GET"})
     */
    public function index(EquilibreHarmoniqueCerveauGaucheCerveauDroitRepository $equilibreHarmoniqueCerveauGaucheCerveauDroitRepository): Response
    {
        return $this->render('equilibre_harmonique_cerveau_gauche_cerveau_droit/index.html.twig', [
            'equilibre_harmonique_cerveau_gauche_cerveau_droits' => $equilibreHarmoniqueCerveauGaucheCerveauDroitRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_equilibre_harmonique_cerveau_gauche_cerveau_droit_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EquilibreHarmoniqueCerveauGaucheCerveauDroitRepository $equilibreHarmoniqueCerveauGaucheCerveauDroitRepository): Response
    {
        $equilibreHarmoniqueCerveauGaucheCerveauDroit = new EquilibreHarmoniqueCerveauGaucheCerveauDroit();
        $form = $this->createForm(EquilibreHarmoniqueCerveauGaucheCerveauDroitType::class, $equilibreHarmoniqueCerveauGaucheCerveauDroit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $equilibreHarmoniqueCerveauGaucheCerveauDroitRepository->add($equilibreHarmoniqueCerveauGaucheCerveauDroit);
            return $this->redirectToRoute('app_equilibre_harmonique_cerveau_gauche_cerveau_droit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('equilibre_harmonique_cerveau_gauche_cerveau_droit/new.html.twig', [
            'equilibre_harmonique_cerveau_gauche_cerveau_droit' => $equilibreHarmoniqueCerveauGaucheCerveauDroit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_equilibre_harmonique_cerveau_gauche_cerveau_droit_show", methods={"GET"})
     */
    public function show(EquilibreHarmoniqueCerveauGaucheCerveauDroit $equilibreHarmoniqueCerveauGaucheCerveauDroit): Response
    {
        return $this->render('equilibre_harmonique_cerveau_gauche_cerveau_droit/show.html.twig', [
            'equilibre_harmonique_cerveau_gauche_cerveau_droit' => $equilibreHarmoniqueCerveauGaucheCerveauDroit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_equilibre_harmonique_cerveau_gauche_cerveau_droit_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EquilibreHarmoniqueCerveauGaucheCerveauDroit $equilibreHarmoniqueCerveauGaucheCerveauDroit, EquilibreHarmoniqueCerveauGaucheCerveauDroitRepository $equilibreHarmoniqueCerveauGaucheCerveauDroitRepository): Response
    {
        $form = $this->createForm(EquilibreHarmoniqueCerveauGaucheCerveauDroitType::class, $equilibreHarmoniqueCerveauGaucheCerveauDroit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $equilibreHarmoniqueCerveauGaucheCerveauDroitRepository->add($equilibreHarmoniqueCerveauGaucheCerveauDroit);
            return $this->redirectToRoute('app_equilibre_harmonique_cerveau_gauche_cerveau_droit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('equilibre_harmonique_cerveau_gauche_cerveau_droit/edit.html.twig', [
            'equilibre_harmonique_cerveau_gauche_cerveau_droit' => $equilibreHarmoniqueCerveauGaucheCerveauDroit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_equilibre_harmonique_cerveau_gauche_cerveau_droit_delete", methods={"POST"})
     */
    public function delete(Request $request, EquilibreHarmoniqueCerveauGaucheCerveauDroit $equilibreHarmoniqueCerveauGaucheCerveauDroit, EquilibreHarmoniqueCerveauGaucheCerveauDroitRepository $equilibreHarmoniqueCerveauGaucheCerveauDroitRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$equilibreHarmoniqueCerveauGaucheCerveauDroit->getId(), $request->request->get('_token'))) {
            $equilibreHarmoniqueCerveauGaucheCerveauDroitRepository->remove($equilibreHarmoniqueCerveauGaucheCerveauDroit);
        }

        return $this->redirectToRoute('app_equilibre_harmonique_cerveau_gauche_cerveau_droit_index', [], Response::HTTP_SEE_OTHER);
    }
}
