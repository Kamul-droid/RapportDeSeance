<?php

namespace App\Controller;

use App\Entity\life\AcidesAmines;
use App\Form\AcidesAminesType;
use App\Repository\AcidesAminesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/acides/amines")
 */
class AcidesAminesController extends AbstractController
{
    /**
     * @Route("/", name="app_acides_amines_index", methods={"GET"})
     */
    public function index(AcidesAminesRepository $acidesAminesRepository): Response
    {
        return $this->render('acides_amines/accueil.html.twig', [
            'acides_amines' => $acidesAminesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_acides_amines_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AcidesAminesRepository $acidesAminesRepository): Response
    {
        $acidesAmine = new AcidesAmines();
        $form = $this->createForm(AcidesAminesType::class, $acidesAmine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $acidesAminesRepository->add($acidesAmine);
            return $this->redirectToRoute('app_acides_amines_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('acides_amines/new.html.twig', [
            'acides_amine' => $acidesAmine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_acides_amines_show", methods={"GET"})
     */
    public function show(AcidesAmines $acidesAmine): Response
    {
        return $this->render('acides_amines/show.html.twig', [
            'acides_amine' => $acidesAmine,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_acides_amines_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, AcidesAmines $acidesAmine, AcidesAminesRepository $acidesAminesRepository): Response
    {
        $form = $this->createForm(AcidesAminesType::class, $acidesAmine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $acidesAminesRepository->add($acidesAmine);
            return $this->redirectToRoute('app_acides_amines_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('acides_amines/edit.html.twig', [
            'acides_amine' => $acidesAmine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_acides_amines_delete", methods={"POST"})
     */
    public function delete(Request $request, AcidesAmines $acidesAmine, AcidesAminesRepository $acidesAminesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$acidesAmine->getId(), $request->request->get('_token'))) {
            $acidesAminesRepository->remove($acidesAmine);
        }

        return $this->redirectToRoute('app_acides_amines_index', [], Response::HTTP_SEE_OTHER);
    }
}
