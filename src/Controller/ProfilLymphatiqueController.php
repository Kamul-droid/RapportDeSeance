<?php

namespace App\Controller;

use App\Entity\life\ProfilLymphatique;
use App\Form\ProfilLymphatiqueType;
use App\Repository\ProfilLymphatiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/lymphatique")
 */
class ProfilLymphatiqueController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_lymphatique_index", methods={"GET"})
     */
    public function index(ProfilLymphatiqueRepository $profilLymphatiqueRepository): Response
    {
        return $this->render('profil_lymphatique/index.html.twig', [
            'profil_lymphatiques' => $profilLymphatiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_lymphatique_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilLymphatiqueRepository $profilLymphatiqueRepository): Response
    {
        $profilLymphatique = new ProfilLymphatique();
        $form = $this->createForm(ProfilLymphatiqueType::class, $profilLymphatique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilLymphatiqueRepository->add($profilLymphatique);
            return $this->redirectToRoute('app_profil_lymphatique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_lymphatique/new.html.twig', [
            'profil_lymphatique' => $profilLymphatique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_lymphatique_show", methods={"GET"})
     */
    public function show(ProfilLymphatique $profilLymphatique): Response
    {
        return $this->render('profil_lymphatique/show.html.twig', [
            'profil_lymphatique' => $profilLymphatique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_lymphatique_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilLymphatique $profilLymphatique, ProfilLymphatiqueRepository $profilLymphatiqueRepository): Response
    {
        $form = $this->createForm(ProfilLymphatiqueType::class, $profilLymphatique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilLymphatiqueRepository->add($profilLymphatique);
            return $this->redirectToRoute('app_profil_lymphatique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_lymphatique/edit.html.twig', [
            'profil_lymphatique' => $profilLymphatique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_lymphatique_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilLymphatique $profilLymphatique, ProfilLymphatiqueRepository $profilLymphatiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilLymphatique->getId(), $request->request->get('_token'))) {
            $profilLymphatiqueRepository->remove($profilLymphatique);
        }

        return $this->redirectToRoute('app_profil_lymphatique_index', [], Response::HTTP_SEE_OTHER);
    }
}
