<?php

namespace App\Controller;

use App\Entity\life\ProfilIridologie;
use App\Form\ProfilIridologieType;
use App\Repository\ProfilIridologieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/iridologie")
 */
class ProfilIridologieController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_iridologie_index", methods={"GET"})
     */
    public function index(ProfilIridologieRepository $profilIridologieRepository): Response
    {
        return $this->render('profil_iridologie/index.html.twig', [
            'profil_iridologies' => $profilIridologieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_iridologie_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilIridologieRepository $profilIridologieRepository): Response
    {
        $profilIridologie = new ProfilIridologie();
        $form = $this->createForm(ProfilIridologieType::class, $profilIridologie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilIridologieRepository->add($profilIridologie);
            return $this->redirectToRoute('app_profil_iridologie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_iridologie/new.html.twig', [
            'profil_iridologie' => $profilIridologie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_iridologie_show", methods={"GET"})
     */
    public function show(ProfilIridologie $profilIridologie): Response
    {
        return $this->render('profil_iridologie/show.html.twig', [
            'profil_iridologie' => $profilIridologie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_iridologie_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilIridologie $profilIridologie, ProfilIridologieRepository $profilIridologieRepository): Response
    {
        $form = $this->createForm(ProfilIridologieType::class, $profilIridologie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilIridologieRepository->add($profilIridologie);
            return $this->redirectToRoute('app_profil_iridologie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_iridologie/edit.html.twig', [
            'profil_iridologie' => $profilIridologie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_iridologie_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilIridologie $profilIridologie, ProfilIridologieRepository $profilIridologieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilIridologie->getId(), $request->request->get('_token'))) {
            $profilIridologieRepository->remove($profilIridologie);
        }

        return $this->redirectToRoute('app_profil_iridologie_index', [], Response::HTTP_SEE_OTHER);
    }
}
