<?php

namespace App\Controller;

use App\Entity\life\ProfilOs;
use App\Form\ProfilOsType;
use App\Repository\ProfilOsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/os")
 */
class ProfilOsController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_os_index", methods={"GET"})
     */
    public function index(ProfilOsRepository $profilOsRepository): Response
    {
        return $this->render('profil_os/index.html.twig', [
            'profil_os' => $profilOsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_os_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilOsRepository $profilOsRepository): Response
    {
        $profilO = new ProfilOs();
        $form = $this->createForm(ProfilOsType::class, $profilO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilOsRepository->add($profilO);
            return $this->redirectToRoute('app_profil_os_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_os/new.html.twig', [
            'profil_o' => $profilO,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_os_show", methods={"GET"})
     */
    public function show(ProfilOs $profilO): Response
    {
        return $this->render('profil_os/show.html.twig', [
            'profil_o' => $profilO,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_os_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilOs $profilO, ProfilOsRepository $profilOsRepository): Response
    {
        $form = $this->createForm(ProfilOsType::class, $profilO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilOsRepository->add($profilO);
            return $this->redirectToRoute('app_profil_os_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_os/edit.html.twig', [
            'profil_o' => $profilO,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_os_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilOs $profilO, ProfilOsRepository $profilOsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilO->getId(), $request->request->get('_token'))) {
            $profilOsRepository->remove($profilO);
        }

        return $this->redirectToRoute('app_profil_os_index', [], Response::HTTP_SEE_OTHER);
    }
}
