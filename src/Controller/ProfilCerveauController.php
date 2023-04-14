<?php

namespace App\Controller;

use App\Entity\life\ProfilCerveau;
use App\Form\ProfilCerveauType;
use App\Repository\ProfilCerveauRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/cerveau")
 */
class ProfilCerveauController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_cerveau_index", methods={"GET"})
     */
    public function index(ProfilCerveauRepository $profilCerveauRepository): Response
    {
        return $this->render('profil_cerveau/index.html.twig', [
            'profil_cerveaus' => $profilCerveauRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_cerveau_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilCerveauRepository $profilCerveauRepository): Response
    {
        $profilCerveau = new ProfilCerveau();
        $form = $this->createForm(ProfilCerveauType::class, $profilCerveau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilCerveauRepository->add($profilCerveau);
            return $this->redirectToRoute('app_profil_cerveau_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_cerveau/new.html.twig', [
            'profil_cerveau' => $profilCerveau,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_cerveau_show", methods={"GET"})
     */
    public function show(ProfilCerveau $profilCerveau): Response
    {
        return $this->render('profil_cerveau/show.html.twig', [
            'profil_cerveau' => $profilCerveau,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_cerveau_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilCerveau $profilCerveau, ProfilCerveauRepository $profilCerveauRepository): Response
    {
        $form = $this->createForm(ProfilCerveauType::class, $profilCerveau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilCerveauRepository->add($profilCerveau);
            return $this->redirectToRoute('app_profil_cerveau_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_cerveau/edit.html.twig', [
            'profil_cerveau' => $profilCerveau,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_cerveau_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilCerveau $profilCerveau, ProfilCerveauRepository $profilCerveauRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilCerveau->getId(), $request->request->get('_token'))) {
            $profilCerveauRepository->remove($profilCerveau);
        }

        return $this->redirectToRoute('app_profil_cerveau_index', [], Response::HTTP_SEE_OTHER);
    }
}
