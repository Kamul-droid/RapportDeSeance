<?php

namespace App\Controller;

use App\Entity\life\ProfilCellCom;
use App\Form\ProfilCellComType;
use App\Repository\ProfilCellComRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/cell/com")
 */
class ProfilCellComController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_cell_com_index", methods={"GET"})
     */
    public function index(ProfilCellComRepository $profilCellComRepository): Response
    {
        return $this->render('profil_cell_com/index.html.twig', [
            'profil_cell_coms' => $profilCellComRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_cell_com_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilCellComRepository $profilCellComRepository): Response
    {
        $profilCellCom = new ProfilCellCom();
        $form = $this->createForm(ProfilCellComType::class, $profilCellCom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilCellComRepository->add($profilCellCom);
            return $this->redirectToRoute('app_profil_cell_com_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_cell_com/new.html.twig', [
            'profil_cell_com' => $profilCellCom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_cell_com_show", methods={"GET"})
     */
    public function show(ProfilCellCom $profilCellCom): Response
    {
        return $this->render('profil_cell_com/show.html.twig', [
            'profil_cell_com' => $profilCellCom,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_cell_com_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilCellCom $profilCellCom, ProfilCellComRepository $profilCellComRepository): Response
    {
        $form = $this->createForm(ProfilCellComType::class, $profilCellCom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilCellComRepository->add($profilCellCom);
            return $this->redirectToRoute('app_profil_cell_com_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_cell_com/edit.html.twig', [
            'profil_cell_com' => $profilCellCom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_cell_com_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilCellCom $profilCellCom, ProfilCellComRepository $profilCellComRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilCellCom->getId(), $request->request->get('_token'))) {
            $profilCellComRepository->remove($profilCellCom);
        }

        return $this->redirectToRoute('app_profil_cell_com_index', [], Response::HTTP_SEE_OTHER);
    }
}
