<?php

namespace App\Controller;

use App\Entity\life\ProfilSinusGorge;
use App\Form\ProfilSinusGorgeType;
use App\Repository\ProfilSinusGorgeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/sinus/gorge")
 */
class ProfilSinusGorgeController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_sinus_gorge_index", methods={"GET"})
     */
    public function index(ProfilSinusGorgeRepository $profilSinusGorgeRepository): Response
    {
        return $this->render('profil_sinus_gorge/index.html.twig', [
            'profil_sinus_gorges' => $profilSinusGorgeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_sinus_gorge_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilSinusGorgeRepository $profilSinusGorgeRepository): Response
    {
        $profilSinusGorge = new ProfilSinusGorge();
        $form = $this->createForm(ProfilSinusGorgeType::class, $profilSinusGorge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilSinusGorgeRepository->add($profilSinusGorge);
            return $this->redirectToRoute('app_profil_sinus_gorge_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_sinus_gorge/new.html.twig', [
            'profil_sinus_gorge' => $profilSinusGorge,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_sinus_gorge_show", methods={"GET"})
     */
    public function show(ProfilSinusGorge $profilSinusGorge): Response
    {
        return $this->render('profil_sinus_gorge/show.html.twig', [
            'profil_sinus_gorge' => $profilSinusGorge,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_sinus_gorge_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilSinusGorge $profilSinusGorge, ProfilSinusGorgeRepository $profilSinusGorgeRepository): Response
    {
        $form = $this->createForm(ProfilSinusGorgeType::class, $profilSinusGorge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilSinusGorgeRepository->add($profilSinusGorge);
            return $this->redirectToRoute('app_profil_sinus_gorge_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_sinus_gorge/edit.html.twig', [
            'profil_sinus_gorge' => $profilSinusGorge,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_sinus_gorge_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilSinusGorge $profilSinusGorge, ProfilSinusGorgeRepository $profilSinusGorgeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilSinusGorge->getId(), $request->request->get('_token'))) {
            $profilSinusGorgeRepository->remove($profilSinusGorge);
        }

        return $this->redirectToRoute('app_profil_sinus_gorge_index', [], Response::HTTP_SEE_OTHER);
    }
}
