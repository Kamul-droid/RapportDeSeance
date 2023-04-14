<?php

namespace App\Controller;

use App\Entity\life\ProfilNeuroEmotionnel;
use App\Form\ProfilNeuroEmotionnelType;
use App\Repository\ProfilNeuroEmotionnelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/neuro/emotionnel")
 */
class ProfilNeuroEmotionnelController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_neuro_emotionnel_index", methods={"GET"})
     */
    public function index(ProfilNeuroEmotionnelRepository $profilNeuroEmotionnelRepository): Response
    {
        return $this->render('profil_neuro_emotionnel/index.html.twig', [
            'profil_neuro_emotionnels' => $profilNeuroEmotionnelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_neuro_emotionnel_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilNeuroEmotionnelRepository $profilNeuroEmotionnelRepository): Response
    {
        $profilNeuroEmotionnel = new ProfilNeuroEmotionnel();
        $form = $this->createForm(ProfilNeuroEmotionnelType::class, $profilNeuroEmotionnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilNeuroEmotionnelRepository->add($profilNeuroEmotionnel);
            return $this->redirectToRoute('app_profil_neuro_emotionnel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_neuro_emotionnel/new.html.twig', [
            'profil_neuro_emotionnel' => $profilNeuroEmotionnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_neuro_emotionnel_show", methods={"GET"})
     */
    public function show(ProfilNeuroEmotionnel $profilNeuroEmotionnel): Response
    {
        return $this->render('profil_neuro_emotionnel/show.html.twig', [
            'profil_neuro_emotionnel' => $profilNeuroEmotionnel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_neuro_emotionnel_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilNeuroEmotionnel $profilNeuroEmotionnel, ProfilNeuroEmotionnelRepository $profilNeuroEmotionnelRepository): Response
    {
        $form = $this->createForm(ProfilNeuroEmotionnelType::class, $profilNeuroEmotionnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilNeuroEmotionnelRepository->add($profilNeuroEmotionnel);
            return $this->redirectToRoute('app_profil_neuro_emotionnel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_neuro_emotionnel/edit.html.twig', [
            'profil_neuro_emotionnel' => $profilNeuroEmotionnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_neuro_emotionnel_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilNeuroEmotionnel $profilNeuroEmotionnel, ProfilNeuroEmotionnelRepository $profilNeuroEmotionnelRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilNeuroEmotionnel->getId(), $request->request->get('_token'))) {
            $profilNeuroEmotionnelRepository->remove($profilNeuroEmotionnel);
        }

        return $this->redirectToRoute('app_profil_neuro_emotionnel_index', [], Response::HTTP_SEE_OTHER);
    }
}
