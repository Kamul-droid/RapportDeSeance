<?php

namespace App\Controller;

use App\Entity\life\ProfilAnimaux;
use App\Form\ProfilAnimauxType;
use App\Repository\ProfilAnimauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/animaux")
 */
class ProfilAnimauxController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_animaux_index", methods={"GET"})
     */
    public function index(ProfilAnimauxRepository $profilAnimauxRepository): Response
    {
        return $this->render('profil_animaux/index.html.twig', [
            'profil_animauxes' => $profilAnimauxRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_animaux_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilAnimauxRepository $profilAnimauxRepository): Response
    {
        $profilAnimaux = new ProfilAnimaux();
        $form = $this->createForm(ProfilAnimauxType::class, $profilAnimaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilAnimauxRepository->add($profilAnimaux);
            return $this->redirectToRoute('app_profil_animaux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_animaux/new.html.twig', [
            'profil_animaux' => $profilAnimaux,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_animaux_show", methods={"GET"})
     */
    public function show(ProfilAnimaux $profilAnimaux): Response
    {
        return $this->render('profil_animaux/show.html.twig', [
            'profil_animaux' => $profilAnimaux,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_animaux_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilAnimaux $profilAnimaux, ProfilAnimauxRepository $profilAnimauxRepository): Response
    {
        $form = $this->createForm(ProfilAnimauxType::class, $profilAnimaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilAnimauxRepository->add($profilAnimaux);
            return $this->redirectToRoute('app_profil_animaux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_animaux/edit.html.twig', [
            'profil_animaux' => $profilAnimaux,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_animaux_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilAnimaux $profilAnimaux, ProfilAnimauxRepository $profilAnimauxRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilAnimaux->getId(), $request->request->get('_token'))) {
            $profilAnimauxRepository->remove($profilAnimaux);
        }

        return $this->redirectToRoute('app_profil_animaux_index', [], Response::HTTP_SEE_OTHER);
    }
}
