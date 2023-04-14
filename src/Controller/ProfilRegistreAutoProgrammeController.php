<?php

namespace App\Controller;

use App\Entity\life\ProfilRegistreAutoProgramme;
use App\Form\ProfilRegistreAutoProgrammeType;
use App\Repository\ProfilRegistreAutoProgrammeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/registre/auto/programme")
 */
class ProfilRegistreAutoProgrammeController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_registre_auto_programme_index", methods={"GET"})
     */
    public function index(ProfilRegistreAutoProgrammeRepository $profilRegistreAutoProgrammeRepository): Response
    {
        return $this->render('profil_registre_auto_programme/index.html.twig', [
            'profil_registre_auto_programmes' => $profilRegistreAutoProgrammeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_registre_auto_programme_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilRegistreAutoProgrammeRepository $profilRegistreAutoProgrammeRepository): Response
    {
        $profilRegistreAutoProgramme = new ProfilRegistreAutoProgramme();
        $form = $this->createForm(ProfilRegistreAutoProgrammeType::class, $profilRegistreAutoProgramme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilRegistreAutoProgrammeRepository->add($profilRegistreAutoProgramme);
            return $this->redirectToRoute('app_profil_registre_auto_programme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_registre_auto_programme/new.html.twig', [
            'profil_registre_auto_programme' => $profilRegistreAutoProgramme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_registre_auto_programme_show", methods={"GET"})
     */
    public function show(ProfilRegistreAutoProgramme $profilRegistreAutoProgramme): Response
    {
        return $this->render('profil_registre_auto_programme/show.html.twig', [
            'profil_registre_auto_programme' => $profilRegistreAutoProgramme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_registre_auto_programme_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilRegistreAutoProgramme $profilRegistreAutoProgramme, ProfilRegistreAutoProgrammeRepository $profilRegistreAutoProgrammeRepository): Response
    {
        $form = $this->createForm(ProfilRegistreAutoProgrammeType::class, $profilRegistreAutoProgramme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilRegistreAutoProgrammeRepository->add($profilRegistreAutoProgramme);
            return $this->redirectToRoute('app_profil_registre_auto_programme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_registre_auto_programme/edit.html.twig', [
            'profil_registre_auto_programme' => $profilRegistreAutoProgramme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_registre_auto_programme_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilRegistreAutoProgramme $profilRegistreAutoProgramme, ProfilRegistreAutoProgrammeRepository $profilRegistreAutoProgrammeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilRegistreAutoProgramme->getId(), $request->request->get('_token'))) {
            $profilRegistreAutoProgrammeRepository->remove($profilRegistreAutoProgramme);
        }

        return $this->redirectToRoute('app_profil_registre_auto_programme_index', [], Response::HTTP_SEE_OTHER);
    }
}
