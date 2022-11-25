<?php

namespace App\Controller;

use App\Entity\ChronologieDesFacteurs;
use App\Form\ChronologieDesFacteursType;
use App\Repository\ChronologieDesFacteursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chronologie/des/facteurs")
 */
class ChronologieDesFacteursController extends AbstractController
{
    /**
     * @Route("/", name="app_chronologie_des_facteurs_index", methods={"GET"})
     */
    public function index(ChronologieDesFacteursRepository $chronologieDesFacteursRepository): Response
    {
        return $this->render('chronologie_des_facteurs/index.html.twig', [
            'chronologie_des_facteurs' => $chronologieDesFacteursRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_chronologie_des_facteurs_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ChronologieDesFacteursRepository $chronologieDesFacteursRepository): Response
    {
        $chronologieDesFacteur = new ChronologieDesFacteurs();
        $form = $this->createForm(ChronologieDesFacteursType::class, $chronologieDesFacteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chronologieDesFacteursRepository->add($chronologieDesFacteur);
            return $this->redirectToRoute('app_chronologie_des_facteurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('chronologie_des_facteurs/new.html.twig', [
            'chronologie_des_facteur' => $chronologieDesFacteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_chronologie_des_facteurs_show", methods={"GET"})
     */
    public function show(ChronologieDesFacteurs $chronologieDesFacteur): Response
    {
        return $this->render('chronologie_des_facteurs/show.html.twig', [
            'chronologie_des_facteur' => $chronologieDesFacteur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_chronologie_des_facteurs_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ChronologieDesFacteurs $chronologieDesFacteur, ChronologieDesFacteursRepository $chronologieDesFacteursRepository): Response
    {
        $form = $this->createForm(ChronologieDesFacteursType::class, $chronologieDesFacteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chronologieDesFacteursRepository->add($chronologieDesFacteur);
            return $this->redirectToRoute('app_chronologie_des_facteurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('chronologie_des_facteurs/edit.html.twig', [
            'chronologie_des_facteur' => $chronologieDesFacteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_chronologie_des_facteurs_delete", methods={"POST"})
     */
    public function delete(Request $request, ChronologieDesFacteurs $chronologieDesFacteur, ChronologieDesFacteursRepository $chronologieDesFacteursRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chronologieDesFacteur->getId(), $request->request->get('_token'))) {
            $chronologieDesFacteursRepository->remove($chronologieDesFacteur);
        }

        return $this->redirectToRoute('app_chronologie_des_facteurs_index', [], Response::HTTP_SEE_OTHER);
    }
}
