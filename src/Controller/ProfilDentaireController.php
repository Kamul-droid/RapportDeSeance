<?php

namespace App\Controller;

use App\Entity\ProfilDentaire;
use App\Form\ProfilDentaireType;
use App\Repository\ProfilDentaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/dentaire")
 */
class ProfilDentaireController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_dentaire_index", methods={"GET"})
     */
    public function index(ProfilDentaireRepository $profilDentaireRepository): Response
    {
        return $this->render('profil_dentaire/index.html.twig', [
            'profil_dentaires' => $profilDentaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_dentaire_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilDentaireRepository $profilDentaireRepository): Response
    {
        $profilDentaire = new ProfilDentaire();
        $form = $this->createForm(ProfilDentaireType::class, $profilDentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilDentaireRepository->add($profilDentaire);
            return $this->redirectToRoute('app_profil_dentaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_dentaire/new.html.twig', [
            'profil_dentaire' => $profilDentaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_dentaire_show", methods={"GET"})
     */
    public function show(ProfilDentaire $profilDentaire): Response
    {
        return $this->render('profil_dentaire/show.html.twig', [
            'profil_dentaire' => $profilDentaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_dentaire_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilDentaire $profilDentaire, ProfilDentaireRepository $profilDentaireRepository): Response
    {
        $form = $this->createForm(ProfilDentaireType::class, $profilDentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilDentaireRepository->add($profilDentaire);
            return $this->redirectToRoute('app_profil_dentaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_dentaire/edit.html.twig', [
            'profil_dentaire' => $profilDentaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_dentaire_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilDentaire $profilDentaire, ProfilDentaireRepository $profilDentaireRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilDentaire->getId(), $request->request->get('_token'))) {
            $profilDentaireRepository->remove($profilDentaire);
        }

        return $this->redirectToRoute('app_profil_dentaire_index', [], Response::HTTP_SEE_OTHER);
    }
}
