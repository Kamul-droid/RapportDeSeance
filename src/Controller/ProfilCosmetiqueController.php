<?php

namespace App\Controller;

use App\Entity\life\ProfilCosmetique;
use App\Form\ProfilCosmetiqueType;
use App\Repository\ProfilCosmetiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/cosmetique")
 */
class ProfilCosmetiqueController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_cosmetique_index", methods={"GET"})
     */
    public function index(ProfilCosmetiqueRepository $profilCosmetiqueRepository): Response
    {
        return $this->render('profil_cosmetique/index.html.twig', [
            'profil_cosmetiques' => $profilCosmetiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_cosmetique_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilCosmetiqueRepository $profilCosmetiqueRepository): Response
    {
        $profilCosmetique = new ProfilCosmetique();
        $form = $this->createForm(ProfilCosmetiqueType::class, $profilCosmetique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilCosmetiqueRepository->add($profilCosmetique);
            return $this->redirectToRoute('app_profil_cosmetique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_cosmetique/new.html.twig', [
            'profil_cosmetique' => $profilCosmetique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_cosmetique_show", methods={"GET"})
     */
    public function show(ProfilCosmetique $profilCosmetique): Response
    {
        return $this->render('profil_cosmetique/show.html.twig', [
            'profil_cosmetique' => $profilCosmetique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_cosmetique_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilCosmetique $profilCosmetique, ProfilCosmetiqueRepository $profilCosmetiqueRepository): Response
    {
        $form = $this->createForm(ProfilCosmetiqueType::class, $profilCosmetique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilCosmetiqueRepository->add($profilCosmetique);
            return $this->redirectToRoute('app_profil_cosmetique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_cosmetique/edit.html.twig', [
            'profil_cosmetique' => $profilCosmetique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_cosmetique_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilCosmetique $profilCosmetique, ProfilCosmetiqueRepository $profilCosmetiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilCosmetique->getId(), $request->request->get('_token'))) {
            $profilCosmetiqueRepository->remove($profilCosmetique);
        }

        return $this->redirectToRoute('app_profil_cosmetique_index', [], Response::HTTP_SEE_OTHER);
    }
}
