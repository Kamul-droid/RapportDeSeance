<?php

namespace App\Controller;

use App\Entity\life\RegistreDeSusceptibilite;
use App\Form\RegistreDeSusceptibiliteType;
use App\Repository\RegistreDeSusceptibiliteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/registre/de/susceptibilite")
 */
class RegistreDeSusceptibiliteController extends AbstractController
{
    /**
     * @Route("/", name="app_registre_de_susceptibilite_index", methods={"GET"})
     */
    public function index(RegistreDeSusceptibiliteRepository $registreDeSusceptibiliteRepository): Response
    {
        return $this->render('registre_de_susceptibilite/index.html.twig', [
            'registre_de_susceptibilites' => $registreDeSusceptibiliteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_registre_de_susceptibilite_new", methods={"GET", "POST"})
     */
    public function new(Request $request, RegistreDeSusceptibiliteRepository $registreDeSusceptibiliteRepository): Response
    {
        $registreDeSusceptibilite = new RegistreDeSusceptibilite();
        $form = $this->createForm(RegistreDeSusceptibiliteType::class, $registreDeSusceptibilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $registreDeSusceptibiliteRepository->add($registreDeSusceptibilite);
            return $this->redirectToRoute('app_registre_de_susceptibilite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('registre_de_susceptibilite/new.html.twig', [
            'registre_de_susceptibilite' => $registreDeSusceptibilite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_registre_de_susceptibilite_show", methods={"GET"})
     */
    public function show(RegistreDeSusceptibilite $registreDeSusceptibilite): Response
    {
        return $this->render('registre_de_susceptibilite/show.html.twig', [
            'registre_de_susceptibilite' => $registreDeSusceptibilite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_registre_de_susceptibilite_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, RegistreDeSusceptibilite $registreDeSusceptibilite, RegistreDeSusceptibiliteRepository $registreDeSusceptibiliteRepository): Response
    {
        $form = $this->createForm(RegistreDeSusceptibiliteType::class, $registreDeSusceptibilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $registreDeSusceptibiliteRepository->add($registreDeSusceptibilite);
            return $this->redirectToRoute('app_registre_de_susceptibilite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('registre_de_susceptibilite/edit.html.twig', [
            'registre_de_susceptibilite' => $registreDeSusceptibilite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_registre_de_susceptibilite_delete", methods={"POST"})
     */
    public function delete(Request $request, RegistreDeSusceptibilite $registreDeSusceptibilite, RegistreDeSusceptibiliteRepository $registreDeSusceptibiliteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$registreDeSusceptibilite->getId(), $request->request->get('_token'))) {
            $registreDeSusceptibiliteRepository->remove($registreDeSusceptibilite);
        }

        return $this->redirectToRoute('app_registre_de_susceptibilite_index', [], Response::HTTP_SEE_OTHER);
    }
}
