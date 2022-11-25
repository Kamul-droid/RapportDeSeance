<?php

namespace App\Controller;

use App\Entity\Transfert;
use App\Form\TransfertType;
use App\Repository\TransfertRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/transfert")
 */
class TransfertController extends AbstractController
{
    /**
     * @Route("/", name="app_transfert_index", methods={"GET"})
     */
    public function index(TransfertRepository $transfertRepository): Response
    {
        return $this->render('transfert/index.html.twig', [
            'transferts' => $transfertRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_transfert_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TransfertRepository $transfertRepository): Response
    {
        $transfert = new Transfert();
        $form = $this->createForm(TransfertType::class, $transfert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $transfertRepository->add($transfert);
            return $this->redirectToRoute('app_transfert_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('transfert/new.html.twig', [
            'transfert' => $transfert,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_transfert_show", methods={"GET"})
     */
    public function show(Transfert $transfert): Response
    {
        return $this->render('transfert/show.html.twig', [
            'transfert' => $transfert,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_transfert_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Transfert $transfert, TransfertRepository $transfertRepository): Response
    {
        $form = $this->createForm(TransfertType::class, $transfert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $transfertRepository->add($transfert);
            return $this->redirectToRoute('app_transfert_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('transfert/edit.html.twig', [
            'transfert' => $transfert,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_transfert_delete", methods={"POST"})
     */
    public function delete(Request $request, Transfert $transfert, TransfertRepository $transfertRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transfert->getId(), $request->request->get('_token'))) {
            $transfertRepository->remove($transfert);
        }

        return $this->redirectToRoute('app_transfert_index', [], Response::HTTP_SEE_OTHER);
    }
}
