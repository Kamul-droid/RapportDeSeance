<?php

namespace App\Controller;

use App\Entity\life\ProfilDimensionnel;
use App\Form\ProfilDimensionnelType;
use App\Repository\ProfilDimensionnelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/dimensionnel")
 */
class ProfilDimensionnelController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_dimensionnel_index", methods={"GET"})
     */
    public function index(ProfilDimensionnelRepository $profilDimensionnelRepository): Response
    {
        return $this->render('profil_dimensionnel/index.html.twig', [
            'profil_dimensionnels' => $profilDimensionnelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_dimensionnel_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilDimensionnelRepository $profilDimensionnelRepository): Response
    {
        $profilDimensionnel = new ProfilDimensionnel();
        $form = $this->createForm(ProfilDimensionnelType::class, $profilDimensionnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilDimensionnelRepository->add($profilDimensionnel);
            return $this->redirectToRoute('app_profil_dimensionnel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_dimensionnel/new.html.twig', [
            'profil_dimensionnel' => $profilDimensionnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_dimensionnel_show", methods={"GET"})
     */
    public function show(ProfilDimensionnel $profilDimensionnel): Response
    {
        return $this->render('profil_dimensionnel/show.html.twig', [
            'profil_dimensionnel' => $profilDimensionnel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_dimensionnel_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilDimensionnel $profilDimensionnel, ProfilDimensionnelRepository $profilDimensionnelRepository): Response
    {
        $form = $this->createForm(ProfilDimensionnelType::class, $profilDimensionnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilDimensionnelRepository->add($profilDimensionnel);
            return $this->redirectToRoute('app_profil_dimensionnel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_dimensionnel/edit.html.twig', [
            'profil_dimensionnel' => $profilDimensionnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_dimensionnel_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilDimensionnel $profilDimensionnel, ProfilDimensionnelRepository $profilDimensionnelRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilDimensionnel->getId(), $request->request->get('_token'))) {
            $profilDimensionnelRepository->remove($profilDimensionnel);
        }

        return $this->redirectToRoute('app_profil_dimensionnel_index', [], Response::HTTP_SEE_OTHER);
    }
}
