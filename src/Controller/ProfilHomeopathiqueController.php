<?php

namespace App\Controller;

use App\Entity\life\ProfilHomeopathique;
use App\Form\ProfilHomeopathiqueType;
use App\Repository\ProfilHomeopathiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/homeopathique")
 */
class ProfilHomeopathiqueController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_homeopathique_index", methods={"GET"})
     */
    public function index(ProfilHomeopathiqueRepository $profilHomeopathiqueRepository): Response
    {
        return $this->render('profil_homeopathique/index.html.twig', [
            'profil_homeopathiques' => $profilHomeopathiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_homeopathique_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilHomeopathiqueRepository $profilHomeopathiqueRepository): Response
    {
        $profilHomeopathique = new ProfilHomeopathique();
        $form = $this->createForm(ProfilHomeopathiqueType::class, $profilHomeopathique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilHomeopathiqueRepository->add($profilHomeopathique);
            return $this->redirectToRoute('app_profil_homeopathique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_homeopathique/new.html.twig', [
            'profil_homeopathique' => $profilHomeopathique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_homeopathique_show", methods={"GET"})
     */
    public function show(ProfilHomeopathique $profilHomeopathique): Response
    {
        return $this->render('profil_homeopathique/show.html.twig', [
            'profil_homeopathique' => $profilHomeopathique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_homeopathique_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilHomeopathique $profilHomeopathique, ProfilHomeopathiqueRepository $profilHomeopathiqueRepository): Response
    {
        $form = $this->createForm(ProfilHomeopathiqueType::class, $profilHomeopathique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilHomeopathiqueRepository->add($profilHomeopathique);
            return $this->redirectToRoute('app_profil_homeopathique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_homeopathique/edit.html.twig', [
            'profil_homeopathique' => $profilHomeopathique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_homeopathique_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilHomeopathique $profilHomeopathique, ProfilHomeopathiqueRepository $profilHomeopathiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilHomeopathique->getId(), $request->request->get('_token'))) {
            $profilHomeopathiqueRepository->remove($profilHomeopathique);
        }

        return $this->redirectToRoute('app_profil_homeopathique_index', [], Response::HTTP_SEE_OTHER);
    }
}
