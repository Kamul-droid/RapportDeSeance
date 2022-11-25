<?php

namespace App\Controller;

use App\Entity\ProfilRifeSimili;
use App\Form\ProfilRifeSimiliType;
use App\Repository\ProfilRifeSimiliRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/rife/simili")
 */
class ProfilRifeSimiliController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_rife_simili_index", methods={"GET"})
     */
    public function index(ProfilRifeSimiliRepository $profilRifeSimiliRepository): Response
    {
        return $this->render('profil_rife_simili/index.html.twig', [
            'profil_rife_similis' => $profilRifeSimiliRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_rife_simili_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilRifeSimiliRepository $profilRifeSimiliRepository): Response
    {
        $profilRifeSimili = new ProfilRifeSimili();
        $form = $this->createForm(ProfilRifeSimiliType::class, $profilRifeSimili);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilRifeSimiliRepository->add($profilRifeSimili);
            return $this->redirectToRoute('app_profil_rife_simili_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_rife_simili/new.html.twig', [
            'profil_rife_simili' => $profilRifeSimili,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_rife_simili_show", methods={"GET"})
     */
    public function show(ProfilRifeSimili $profilRifeSimili): Response
    {
        return $this->render('profil_rife_simili/show.html.twig', [
            'profil_rife_simili' => $profilRifeSimili,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_rife_simili_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilRifeSimili $profilRifeSimili, ProfilRifeSimiliRepository $profilRifeSimiliRepository): Response
    {
        $form = $this->createForm(ProfilRifeSimiliType::class, $profilRifeSimili);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilRifeSimiliRepository->add($profilRifeSimili);
            return $this->redirectToRoute('app_profil_rife_simili_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_rife_simili/edit.html.twig', [
            'profil_rife_simili' => $profilRifeSimili,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_rife_simili_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilRifeSimili $profilRifeSimili, ProfilRifeSimiliRepository $profilRifeSimiliRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilRifeSimili->getId(), $request->request->get('_token'))) {
            $profilRifeSimiliRepository->remove($profilRifeSimili);
        }

        return $this->redirectToRoute('app_profil_rife_simili_index', [], Response::HTTP_SEE_OTHER);
    }
}
