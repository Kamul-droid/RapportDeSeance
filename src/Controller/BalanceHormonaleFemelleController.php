<?php

namespace App\Controller;

use App\Entity\BalanceHormonaleFemelle;
use App\Form\BalanceHormonaleFemelleType;
use App\Repository\BalanceHormonaleFemelleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/balance/hormonale/femelle")
 */
class BalanceHormonaleFemelleController extends AbstractController
{
    /**
     * @Route("/", name="app_balance_hormonale_femelle_index", methods={"GET"})
     */
    public function index(BalanceHormonaleFemelleRepository $balanceHormonaleFemelleRepository): Response
    {
        return $this->render('balance_hormonale_femelle/index.html.twig', [
            'balance_hormonale_femelles' => $balanceHormonaleFemelleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_balance_hormonale_femelle_new", methods={"GET", "POST"})
     */
    public function new(Request $request, BalanceHormonaleFemelleRepository $balanceHormonaleFemelleRepository): Response
    {
        $balanceHormonaleFemelle = new BalanceHormonaleFemelle();
        $form = $this->createForm(BalanceHormonaleFemelleType::class, $balanceHormonaleFemelle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $balanceHormonaleFemelleRepository->add($balanceHormonaleFemelle);
            return $this->redirectToRoute('app_balance_hormonale_femelle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('balance_hormonale_femelle/new.html.twig', [
            'balance_hormonale_femelle' => $balanceHormonaleFemelle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_balance_hormonale_femelle_show", methods={"GET"})
     */
    public function show(BalanceHormonaleFemelle $balanceHormonaleFemelle): Response
    {
        return $this->render('balance_hormonale_femelle/show.html.twig', [
            'balance_hormonale_femelle' => $balanceHormonaleFemelle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_balance_hormonale_femelle_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, BalanceHormonaleFemelle $balanceHormonaleFemelle, BalanceHormonaleFemelleRepository $balanceHormonaleFemelleRepository): Response
    {
        $form = $this->createForm(BalanceHormonaleFemelleType::class, $balanceHormonaleFemelle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $balanceHormonaleFemelleRepository->add($balanceHormonaleFemelle);
            return $this->redirectToRoute('app_balance_hormonale_femelle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('balance_hormonale_femelle/edit.html.twig', [
            'balance_hormonale_femelle' => $balanceHormonaleFemelle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_balance_hormonale_femelle_delete", methods={"POST"})
     */
    public function delete(Request $request, BalanceHormonaleFemelle $balanceHormonaleFemelle, BalanceHormonaleFemelleRepository $balanceHormonaleFemelleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$balanceHormonaleFemelle->getId(), $request->request->get('_token'))) {
            $balanceHormonaleFemelleRepository->remove($balanceHormonaleFemelle);
        }

        return $this->redirectToRoute('app_balance_hormonale_femelle_index', [], Response::HTTP_SEE_OTHER);
    }
}
