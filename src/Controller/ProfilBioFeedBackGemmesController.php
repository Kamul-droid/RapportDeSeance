<?php

namespace App\Controller;

use App\Entity\life\ProfilBioFeedBackGemmes;
use App\Form\ProfilBioFeedBackGemmesType;
use App\Repository\ProfilBioFeedBackGemmesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/bio/feed/back/gemmes")
 */
class ProfilBioFeedBackGemmesController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_bio_feed_back_gemmes_index", methods={"GET"})
     */
    public function index(ProfilBioFeedBackGemmesRepository $profilBioFeedBackGemmesRepository): Response
    {
        return $this->render('profil_bio_feed_back_gemmes/index.html.twig', [
            'profil_bio_feed_back_gemmes' => $profilBioFeedBackGemmesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_bio_feed_back_gemmes_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilBioFeedBackGemmesRepository $profilBioFeedBackGemmesRepository): Response
    {
        $profilBioFeedBackGemme = new ProfilBioFeedBackGemmes();
        $form = $this->createForm(ProfilBioFeedBackGemmesType::class, $profilBioFeedBackGemme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilBioFeedBackGemmesRepository->add($profilBioFeedBackGemme);
            return $this->redirectToRoute('app_profil_bio_feed_back_gemmes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_bio_feed_back_gemmes/new.html.twig', [
            'profil_bio_feed_back_gemme' => $profilBioFeedBackGemme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_bio_feed_back_gemmes_show", methods={"GET"})
     */
    public function show(ProfilBioFeedBackGemmes $profilBioFeedBackGemme): Response
    {
        return $this->render('profil_bio_feed_back_gemmes/show.html.twig', [
            'profil_bio_feed_back_gemme' => $profilBioFeedBackGemme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_bio_feed_back_gemmes_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilBioFeedBackGemmes $profilBioFeedBackGemme, ProfilBioFeedBackGemmesRepository $profilBioFeedBackGemmesRepository): Response
    {
        $form = $this->createForm(ProfilBioFeedBackGemmesType::class, $profilBioFeedBackGemme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilBioFeedBackGemmesRepository->add($profilBioFeedBackGemme);
            return $this->redirectToRoute('app_profil_bio_feed_back_gemmes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_bio_feed_back_gemmes/edit.html.twig', [
            'profil_bio_feed_back_gemme' => $profilBioFeedBackGemme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_bio_feed_back_gemmes_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilBioFeedBackGemmes $profilBioFeedBackGemme, ProfilBioFeedBackGemmesRepository $profilBioFeedBackGemmesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilBioFeedBackGemme->getId(), $request->request->get('_token'))) {
            $profilBioFeedBackGemmesRepository->remove($profilBioFeedBackGemme);
        }

        return $this->redirectToRoute('app_profil_bio_feed_back_gemmes_index', [], Response::HTTP_SEE_OTHER);
    }
}
