<?php

namespace App\Controller;

use App\Entity\ProfilOreillesYeux;
use App\Form\ProfilOreillesYeuxType;
use App\Repository\ProfilOreillesYeuxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/oreilles/yeux")
 */
class ProfilOreillesYeuxController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_oreilles_yeux_index", methods={"GET"})
     */
    public function index(ProfilOreillesYeuxRepository $profilOreillesYeuxRepository): Response
    {
        return $this->render('profil_oreilles_yeux/index.html.twig', [
            'profil_oreilles_yeuxes' => $profilOreillesYeuxRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_oreilles_yeux_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilOreillesYeuxRepository $profilOreillesYeuxRepository): Response
    {
        $profilOreillesYeux = new ProfilOreillesYeux();
        $form = $this->createForm(ProfilOreillesYeuxType::class, $profilOreillesYeux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilOreillesYeuxRepository->add($profilOreillesYeux);
            return $this->redirectToRoute('app_profil_oreilles_yeux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_oreilles_yeux/new.html.twig', [
            'profil_oreilles_yeux' => $profilOreillesYeux,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_oreilles_yeux_show", methods={"GET"})
     */
    public function show(ProfilOreillesYeux $profilOreillesYeux): Response
    {
        return $this->render('profil_oreilles_yeux/show.html.twig', [
            'profil_oreilles_yeux' => $profilOreillesYeux,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_oreilles_yeux_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilOreillesYeux $profilOreillesYeux, ProfilOreillesYeuxRepository $profilOreillesYeuxRepository): Response
    {
        $form = $this->createForm(ProfilOreillesYeuxType::class, $profilOreillesYeux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilOreillesYeuxRepository->add($profilOreillesYeux);
            return $this->redirectToRoute('app_profil_oreilles_yeux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_oreilles_yeux/edit.html.twig', [
            'profil_oreilles_yeux' => $profilOreillesYeux,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_oreilles_yeux_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilOreillesYeux $profilOreillesYeux, ProfilOreillesYeuxRepository $profilOreillesYeuxRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilOreillesYeux->getId(), $request->request->get('_token'))) {
            $profilOreillesYeuxRepository->remove($profilOreillesYeux);
        }

        return $this->redirectToRoute('app_profil_oreilles_yeux_index', [], Response::HTTP_SEE_OTHER);
    }
}
