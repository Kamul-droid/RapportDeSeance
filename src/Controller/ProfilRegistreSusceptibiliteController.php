<?php

namespace App\Controller;

use App\Entity\life\ProfilRegistreSusceptibilite;
use App\Form\ProfilRegistreSusceptibiliteType;
use App\Repository\RegistreSusceptibiliteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/registre/susceptibilite")
 */
class ProfilRegistreSusceptibiliteController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_registre_susceptibilite_index", methods={"GET"})
     */
    public function index(RegistreSusceptibiliteRepository $registreSusceptibiliteRepository): Response
    {
        return $this->render('profil_registre_susceptibilite/index.html.twig', [
            'profil_registre_susceptibilites' => $registreSusceptibiliteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_registre_susceptibilite_new", methods={"GET", "POST"})
     */
    public function new(Request $request, RegistreSusceptibiliteRepository $registreSusceptibiliteRepository): Response
    {
        $profilRegistreSusceptibilite = new ProfilRegistreSusceptibilite();
        $form = $this->createForm(ProfilRegistreSusceptibiliteType::class, $profilRegistreSusceptibilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $registreSusceptibiliteRepository->add($profilRegistreSusceptibilite);
            return $this->redirectToRoute('app_profil_registre_susceptibilite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_registre_susceptibilite/new.html.twig', [
            'profil_registre_susceptibilite' => $profilRegistreSusceptibilite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_registre_susceptibilite_show", methods={"GET"})
     */
    public function show(ProfilRegistreSusceptibilite $profilRegistreSusceptibilite): Response
    {
        return $this->render('profil_registre_susceptibilite/show.html.twig', [
            'profil_registre_susceptibilite' => $profilRegistreSusceptibilite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_registre_susceptibilite_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilRegistreSusceptibilite $profilRegistreSusceptibilite, RegistreSusceptibiliteRepository $registreSusceptibiliteRepository): Response
    {
        $form = $this->createForm(ProfilRegistreSusceptibiliteType::class, $profilRegistreSusceptibilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $registreSusceptibiliteRepository->add($profilRegistreSusceptibilite);
            return $this->redirectToRoute('app_profil_registre_susceptibilite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_registre_susceptibilite/edit.html.twig', [
            'profil_registre_susceptibilite' => $profilRegistreSusceptibilite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_registre_susceptibilite_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilRegistreSusceptibilite $profilRegistreSusceptibilite, RegistreSusceptibiliteRepository $registreSusceptibiliteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilRegistreSusceptibilite->getId(), $request->request->get('_token'))) {
            $registreSusceptibiliteRepository->remove($profilRegistreSusceptibilite);
        }

        return $this->redirectToRoute('app_profil_registre_susceptibilite_index', [], Response::HTTP_SEE_OTHER);
    }
}
