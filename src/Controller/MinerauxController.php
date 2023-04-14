<?php

namespace App\Controller;

use App\Entity\life\Mineraux;
use App\Form\MinerauxType;
use App\Repository\MinerauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mineraux")
 */
class MinerauxController extends AbstractController
{
    /**
     * @Route("/", name="app_mineraux_index", methods={"GET"})
     */
    public function index(MinerauxRepository $minerauxRepository): Response
    {
        return $this->render('mineraux/index.html.twig', [
            'minerauxes' => $minerauxRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_mineraux_new", methods={"GET", "POST"})
     */
    public function new(Request $request, MinerauxRepository $minerauxRepository): Response
    {
        $mineraux = new Mineraux();
        $form = $this->createForm(MinerauxType::class, $mineraux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $minerauxRepository->add($mineraux);
            return $this->redirectToRoute('app_mineraux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('mineraux/new.html.twig', [
            'mineraux' => $mineraux,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_mineraux_show", methods={"GET"})
     */
    public function show(Mineraux $mineraux): Response
    {
        return $this->render('mineraux/show.html.twig', [
            'mineraux' => $mineraux,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_mineraux_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Mineraux $mineraux, MinerauxRepository $minerauxRepository): Response
    {
        $form = $this->createForm(MinerauxType::class, $mineraux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $minerauxRepository->add($mineraux);
            return $this->redirectToRoute('app_mineraux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('mineraux/edit.html.twig', [
            'mineraux' => $mineraux,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_mineraux_delete", methods={"POST"})
     */
    public function delete(Request $request, Mineraux $mineraux, MinerauxRepository $minerauxRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mineraux->getId(), $request->request->get('_token'))) {
            $minerauxRepository->remove($mineraux);
        }

        return $this->redirectToRoute('app_mineraux_index', [], Response::HTTP_SEE_OTHER);
    }
}
