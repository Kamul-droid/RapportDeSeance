<?php

namespace App\Controller;

use App\Entity\life\ProfilCirculationCoeur;
use App\Form\ProfilCirculationCoeurType;
use App\Repository\ProfilCirculationCoeurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/circulation/coeur")
 */
class ProfilCirculationCoeurController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_circulation_coeur_index", methods={"GET"})
     */
    public function index(ProfilCirculationCoeurRepository $profilCirculationCoeurRepository): Response
    {
        return $this->render('profil_circulation_coeur/index.html.twig', [
            'profil_circulation_coeurs' => $profilCirculationCoeurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_circulation_coeur_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilCirculationCoeurRepository $profilCirculationCoeurRepository): Response
    {
        $profilCirculationCoeur = new ProfilCirculationCoeur();
        $form = $this->createForm(ProfilCirculationCoeurType::class, $profilCirculationCoeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilCirculationCoeurRepository->add($profilCirculationCoeur);
            return $this->redirectToRoute('app_profil_circulation_coeur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_circulation_coeur/new.html.twig', [
            'profil_circulation_coeur' => $profilCirculationCoeur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_circulation_coeur_show", methods={"GET"})
     */
    public function show(ProfilCirculationCoeur $profilCirculationCoeur): Response
    {
        return $this->render('profil_circulation_coeur/show.html.twig', [
            'profil_circulation_coeur' => $profilCirculationCoeur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_circulation_coeur_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilCirculationCoeur $profilCirculationCoeur, ProfilCirculationCoeurRepository $profilCirculationCoeurRepository): Response
    {
        $form = $this->createForm(ProfilCirculationCoeurType::class, $profilCirculationCoeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilCirculationCoeurRepository->add($profilCirculationCoeur);
            return $this->redirectToRoute('app_profil_circulation_coeur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_circulation_coeur/edit.html.twig', [
            'profil_circulation_coeur' => $profilCirculationCoeur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_circulation_coeur_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilCirculationCoeur $profilCirculationCoeur, ProfilCirculationCoeurRepository $profilCirculationCoeurRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilCirculationCoeur->getId(), $request->request->get('_token'))) {
            $profilCirculationCoeurRepository->remove($profilCirculationCoeur);
        }

        return $this->redirectToRoute('app_profil_circulation_coeur_index', [], Response::HTTP_SEE_OTHER);
    }
}
