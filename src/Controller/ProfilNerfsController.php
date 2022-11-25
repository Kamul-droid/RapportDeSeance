<?php

namespace App\Controller;

use App\Entity\ProfilNerfs;
use App\Form\ProfilNerfsType;
use App\Repository\ProfilNerfsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/nerfs")
 */
class ProfilNerfsController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_nerfs_index", methods={"GET"})
     */
    public function index(ProfilNerfsRepository $profilNerfsRepository): Response
    {
        return $this->render('profil_nerfs/index.html.twig', [
            'profil_nerfs' => $profilNerfsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_nerfs_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilNerfsRepository $profilNerfsRepository): Response
    {
        $profilNerf = new ProfilNerfs();
        $form = $this->createForm(ProfilNerfsType::class, $profilNerf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilNerfsRepository->add($profilNerf);
            return $this->redirectToRoute('app_profil_nerfs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_nerfs/new.html.twig', [
            'profil_nerf' => $profilNerf,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_nerfs_show", methods={"GET"})
     */
    public function show(ProfilNerfs $profilNerf): Response
    {
        return $this->render('profil_nerfs/show.html.twig', [
            'profil_nerf' => $profilNerf,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_nerfs_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilNerfs $profilNerf, ProfilNerfsRepository $profilNerfsRepository): Response
    {
        $form = $this->createForm(ProfilNerfsType::class, $profilNerf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilNerfsRepository->add($profilNerf);
            return $this->redirectToRoute('app_profil_nerfs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_nerfs/edit.html.twig', [
            'profil_nerf' => $profilNerf,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_nerfs_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilNerfs $profilNerf, ProfilNerfsRepository $profilNerfsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilNerf->getId(), $request->request->get('_token'))) {
            $profilNerfsRepository->remove($profilNerf);
        }

        return $this->redirectToRoute('app_profil_nerfs_index', [], Response::HTTP_SEE_OTHER);
    }
}
