<?php

namespace App\Controller;

use App\Entity\life\ProfilRespiratoire;
use App\Form\ProfilRespiratoireType;
use App\Repository\ProfilRespiratoireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/respiratoire")
 */
class ProfilRespiratoireController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_respiratoire_index", methods={"GET"})
     */
    public function index(ProfilRespiratoireRepository $profilRespiratoireRepository): Response
    {
        return $this->render('profil_respiratoire/index.html.twig', [
            'profil_respiratoires' => $profilRespiratoireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_respiratoire_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilRespiratoireRepository $profilRespiratoireRepository): Response
    {
        $profilRespiratoire = new ProfilRespiratoire();
        $form = $this->createForm(ProfilRespiratoireType::class, $profilRespiratoire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilRespiratoireRepository->add($profilRespiratoire);
            return $this->redirectToRoute('app_profil_respiratoire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_respiratoire/new.html.twig', [
            'profil_respiratoire' => $profilRespiratoire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_respiratoire_show", methods={"GET"})
     */
    public function show(ProfilRespiratoire $profilRespiratoire): Response
    {
        return $this->render('profil_respiratoire/show.html.twig', [
            'profil_respiratoire' => $profilRespiratoire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_respiratoire_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilRespiratoire $profilRespiratoire, ProfilRespiratoireRepository $profilRespiratoireRepository): Response
    {
        $form = $this->createForm(ProfilRespiratoireType::class, $profilRespiratoire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilRespiratoireRepository->add($profilRespiratoire);
            return $this->redirectToRoute('app_profil_respiratoire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_respiratoire/edit.html.twig', [
            'profil_respiratoire' => $profilRespiratoire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_respiratoire_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilRespiratoire $profilRespiratoire, ProfilRespiratoireRepository $profilRespiratoireRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilRespiratoire->getId(), $request->request->get('_token'))) {
            $profilRespiratoireRepository->remove($profilRespiratoire);
        }

        return $this->redirectToRoute('app_profil_respiratoire_index', [], Response::HTTP_SEE_OTHER);
    }
}
