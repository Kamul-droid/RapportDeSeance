<?php

namespace App\Controller;

use App\Entity\life\ProfilDigestifs;
use App\Form\ProfilDigestifsType;
use App\Repository\ProfilDigestifsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/digestifs")
 */
class ProfilDigestifsController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_digestifs_index", methods={"GET"})
     */
    public function index(ProfilDigestifsRepository $profilDigestifsRepository): Response
    {
        return $this->render('profil_digestifs/index.html.twig', [
            'profil_digestifs' => $profilDigestifsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_digestifs_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilDigestifsRepository $profilDigestifsRepository): Response
    {
        $profilDigestif = new ProfilDigestifs();
        $form = $this->createForm(ProfilDigestifsType::class, $profilDigestif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilDigestifsRepository->add($profilDigestif);
            return $this->redirectToRoute('app_profil_digestifs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_digestifs/new.html.twig', [
            'profil_digestif' => $profilDigestif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_digestifs_show", methods={"GET"})
     */
    public function show(ProfilDigestifs $profilDigestif): Response
    {
        return $this->render('profil_digestifs/show.html.twig', [
            'profil_digestif' => $profilDigestif,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_digestifs_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilDigestifs $profilDigestif, ProfilDigestifsRepository $profilDigestifsRepository): Response
    {
        $form = $this->createForm(ProfilDigestifsType::class, $profilDigestif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilDigestifsRepository->add($profilDigestif);
            return $this->redirectToRoute('app_profil_digestifs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_digestifs/edit.html.twig', [
            'profil_digestif' => $profilDigestif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_digestifs_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilDigestifs $profilDigestif, ProfilDigestifsRepository $profilDigestifsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilDigestif->getId(), $request->request->get('_token'))) {
            $profilDigestifsRepository->remove($profilDigestif);
        }

        return $this->redirectToRoute('app_profil_digestifs_index', [], Response::HTTP_SEE_OTHER);
    }
}
