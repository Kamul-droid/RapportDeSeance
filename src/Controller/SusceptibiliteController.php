<?php

namespace App\Controller;

use App\Entity\life\Susceptibilite;
use App\Form\SusceptibiliteType;
use App\Repository\SusceptibiliteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/susceptibilite")
 */
class SusceptibiliteController extends AbstractController
{
    /**
     * @Route("/", name="app_susceptibilite_index", methods={"GET"})
     */
    public function index(SusceptibiliteRepository $susceptibiliteRepository): Response
    {
        return $this->render('susceptibilite/index.html.twig', [
            'susceptibilites' => $susceptibiliteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_susceptibilite_new", methods={"GET", "POST"})
     */
    public function new(Request $request, SusceptibiliteRepository $susceptibiliteRepository): Response
    {
        $susceptibilite = new Susceptibilite();
        $form = $this->createForm(SusceptibiliteType::class, $susceptibilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $susceptibiliteRepository->add($susceptibilite);
            return $this->redirectToRoute('app_susceptibilite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('susceptibilite/new.html.twig', [
            'susceptibilite' => $susceptibilite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_susceptibilite_show", methods={"GET"})
     */
    public function show(Susceptibilite $susceptibilite): Response
    {
        return $this->render('susceptibilite/show.html.twig', [
            'susceptibilite' => $susceptibilite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_susceptibilite_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Susceptibilite $susceptibilite, SusceptibiliteRepository $susceptibiliteRepository): Response
    {
        $form = $this->createForm(SusceptibiliteType::class, $susceptibilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $susceptibiliteRepository->add($susceptibilite);
            return $this->redirectToRoute('app_susceptibilite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('susceptibilite/edit.html.twig', [
            'susceptibilite' => $susceptibilite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_susceptibilite_delete", methods={"POST"})
     */
    public function delete(Request $request, Susceptibilite $susceptibilite, SusceptibiliteRepository $susceptibiliteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$susceptibilite->getId(), $request->request->get('_token'))) {
            $susceptibiliteRepository->remove($susceptibilite);
        }

        return $this->redirectToRoute('app_susceptibilite_index', [], Response::HTTP_SEE_OTHER);
    }
}
