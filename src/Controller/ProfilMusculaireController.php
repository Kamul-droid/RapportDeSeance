<?php

namespace App\Controller;

use App\Entity\life\ProfilMusculaire;
use App\Form\ProfilMusculaireType;
use App\Repository\ProfilMusculaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/musculaire")
 */
class ProfilMusculaireController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_musculaire_index", methods={"GET"})
     */
    public function index(ProfilMusculaireRepository $profilMusculaireRepository): Response
    {
        return $this->render('profil_musculaire/index.html.twig', [
            'profil_musculaires' => $profilMusculaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_musculaire_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilMusculaireRepository $profilMusculaireRepository): Response
    {
        $profilMusculaire = new ProfilMusculaire();
        $form = $this->createForm(ProfilMusculaireType::class, $profilMusculaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilMusculaireRepository->add($profilMusculaire);
            return $this->redirectToRoute('app_profil_musculaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_musculaire/new.html.twig', [
            'profil_musculaire' => $profilMusculaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_musculaire_show", methods={"GET"})
     */
    public function show(ProfilMusculaire $profilMusculaire): Response
    {
        return $this->render('profil_musculaire/show.html.twig', [
            'profil_musculaire' => $profilMusculaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_musculaire_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilMusculaire $profilMusculaire, ProfilMusculaireRepository $profilMusculaireRepository): Response
    {
        $form = $this->createForm(ProfilMusculaireType::class, $profilMusculaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilMusculaireRepository->add($profilMusculaire);
            return $this->redirectToRoute('app_profil_musculaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_musculaire/edit.html.twig', [
            'profil_musculaire' => $profilMusculaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_musculaire_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilMusculaire $profilMusculaire, ProfilMusculaireRepository $profilMusculaireRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilMusculaire->getId(), $request->request->get('_token'))) {
            $profilMusculaireRepository->remove($profilMusculaire);
        }

        return $this->redirectToRoute('app_profil_musculaire_index', [], Response::HTTP_SEE_OTHER);
    }
}
