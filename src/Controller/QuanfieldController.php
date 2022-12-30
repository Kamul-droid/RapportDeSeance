<?php

namespace App\Controller;

use App\Entity\Quanfield;
use App\Form\QuanfieldType;
use App\Repository\QuanfieldRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/quanfield")
 */
class QuanfieldController extends AbstractController
{
    /**
     * @Route("/", name="app_quanfield_index", methods={"GET"})
     */
    public function index(QuanfieldRepository $quanfieldRepository): Response
    {
        return $this->render('quanfield/index.html.twig', [
            'quanfields' => $quanfieldRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_quanfield_new", methods={"GET", "POST"})
     */
    public function new(Request $request, QuanfieldRepository $quanfieldRepository): Response
    {
        $quanfield = new Quanfield();
        $form = $this->createForm(QuanfieldType::class, $quanfield);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quanfieldRepository->add($quanfield);
            return $this->redirectToRoute('app_quanfield_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('quanfield/new.html.twig', [
            'quanfield' => $quanfield,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_quanfield_show", methods={"GET"})
     */
    public function show(Quanfield $quanfield): Response
    {
        return $this->render('quanfield/show.html.twig', [
            'quanfield' => $quanfield,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_quanfield_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Quanfield $quanfield, QuanfieldRepository $quanfieldRepository): Response
    {
        $form = $this->createForm(QuanfieldType::class, $quanfield);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quanfieldRepository->add($quanfield);
            return $this->redirectToRoute('app_quanfield_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('quanfield/edit.html.twig', [
            'quanfield' => $quanfield,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_quanfield_delete", methods={"POST"})
     */
    public function delete(Request $request, Quanfield $quanfield, QuanfieldRepository $quanfieldRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$quanfield->getId(), $request->request->get('_token'))) {
            $quanfieldRepository->remove($quanfield);
        }

        return $this->redirectToRoute('app_quanfield_index', [], Response::HTTP_SEE_OTHER);
    }
}
