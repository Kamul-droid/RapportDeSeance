<?php

namespace App\Controller;

use App\Entity\life\ProfilHormonal;
use App\Form\ProfilHormonalType;
use App\Repository\ProfilHormonalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/hormonal")
 */
class ProfilHormonalController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_hormonal_index", methods={"GET"})
     */
    public function index(ProfilHormonalRepository $profilHormonalRepository): Response
    {
        return $this->render('profil_hormonal/index.html.twig', [
            'profil_hormonals' => $profilHormonalRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_hormonal_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilHormonalRepository $profilHormonalRepository): Response
    {
        $profilHormonal = new ProfilHormonal();
        $form = $this->createForm(ProfilHormonalType::class, $profilHormonal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilHormonalRepository->add($profilHormonal);
            return $this->redirectToRoute('app_profil_hormonal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_hormonal/new.html.twig', [
            'profil_hormonal' => $profilHormonal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_hormonal_show", methods={"GET"})
     */
    public function show(ProfilHormonal $profilHormonal): Response
    {
        return $this->render('profil_hormonal/show.html.twig', [
            'profil_hormonal' => $profilHormonal,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_hormonal_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilHormonal $profilHormonal, ProfilHormonalRepository $profilHormonalRepository): Response
    {
        $form = $this->createForm(ProfilHormonalType::class, $profilHormonal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilHormonalRepository->add($profilHormonal);
            return $this->redirectToRoute('app_profil_hormonal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_hormonal/edit.html.twig', [
            'profil_hormonal' => $profilHormonal,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_hormonal_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilHormonal $profilHormonal, ProfilHormonalRepository $profilHormonalRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilHormonal->getId(), $request->request->get('_token'))) {
            $profilHormonalRepository->remove($profilHormonal);
        }

        return $this->redirectToRoute('app_profil_hormonal_index', [], Response::HTTP_SEE_OTHER);
    }
}
