<?php

namespace App\Controller;

use App\Entity\life\ProfilAcuMeridien;
use App\Form\ProfilAcuMeridienType;
use App\Repository\ProfilAcuMeridienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/acu/meridien")
 */
class ProfilAcuMeridienController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_acu_meridien_index", methods={"GET"})
     */
    public function index(ProfilAcuMeridienRepository $profilAcuMeridienRepository): Response
    {
        return $this->render('profil_acu_meridien/index.html.twig', [
            'profil_acu_meridiens' => $profilAcuMeridienRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_acu_meridien_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilAcuMeridienRepository $profilAcuMeridienRepository): Response
    {
        $profilAcuMeridien = new ProfilAcuMeridien();
        $form = $this->createForm(ProfilAcuMeridienType::class, $profilAcuMeridien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilAcuMeridienRepository->add($profilAcuMeridien);
            return $this->redirectToRoute('app_profil_acu_meridien_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_acu_meridien/new.html.twig', [
            'profil_acu_meridien' => $profilAcuMeridien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_acu_meridien_show", methods={"GET"})
     */
    public function show(ProfilAcuMeridien $profilAcuMeridien): Response
    {
        return $this->render('profil_acu_meridien/show.html.twig', [
            'profil_acu_meridien' => $profilAcuMeridien,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_acu_meridien_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilAcuMeridien $profilAcuMeridien, ProfilAcuMeridienRepository $profilAcuMeridienRepository): Response
    {
        $form = $this->createForm(ProfilAcuMeridienType::class, $profilAcuMeridien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilAcuMeridienRepository->add($profilAcuMeridien);
            return $this->redirectToRoute('app_profil_acu_meridien_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_acu_meridien/edit.html.twig', [
            'profil_acu_meridien' => $profilAcuMeridien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_acu_meridien_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilAcuMeridien $profilAcuMeridien, ProfilAcuMeridienRepository $profilAcuMeridienRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilAcuMeridien->getId(), $request->request->get('_token'))) {
            $profilAcuMeridienRepository->remove($profilAcuMeridien);
        }

        return $this->redirectToRoute('app_profil_acu_meridien_index', [], Response::HTTP_SEE_OTHER);
    }
}
