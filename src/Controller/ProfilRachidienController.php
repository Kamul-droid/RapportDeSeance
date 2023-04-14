<?php

namespace App\Controller;

use App\Entity\life\ProfilRachidien;
use App\Form\ProfilRachidienType;
use App\Repository\ProfilRachidienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/rachidien")
 */
class ProfilRachidienController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_rachidien_index", methods={"GET"})
     */
    public function index(ProfilRachidienRepository $profilRachidienRepository): Response
    {
        return $this->render('profil_rachidien/index.html.twig', [
            'profil_rachidiens' => $profilRachidienRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_rachidien_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilRachidienRepository $profilRachidienRepository): Response
    {
        $profilRachidien = new ProfilRachidien();
        $form = $this->createForm(ProfilRachidienType::class, $profilRachidien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilRachidienRepository->add($profilRachidien);
            return $this->redirectToRoute('app_profil_rachidien_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_rachidien/new.html.twig', [
            'profil_rachidien' => $profilRachidien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_rachidien_show", methods={"GET"})
     */
    public function show(ProfilRachidien $profilRachidien): Response
    {
        return $this->render('profil_rachidien/show.html.twig', [
            'profil_rachidien' => $profilRachidien,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_rachidien_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilRachidien $profilRachidien, ProfilRachidienRepository $profilRachidienRepository): Response
    {
        $form = $this->createForm(ProfilRachidienType::class, $profilRachidien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilRachidienRepository->add($profilRachidien);
            return $this->redirectToRoute('app_profil_rachidien_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_rachidien/edit.html.twig', [
            'profil_rachidien' => $profilRachidien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_rachidien_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilRachidien $profilRachidien, ProfilRachidienRepository $profilRachidienRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilRachidien->getId(), $request->request->get('_token'))) {
            $profilRachidienRepository->remove($profilRachidien);
        }

        return $this->redirectToRoute('app_profil_rachidien_index', [], Response::HTTP_SEE_OTHER);
    }
}
