<?php

namespace App\Controller;

use App\Entity\BalanceHormonaleMale;
use App\Form\BalanceHormonaleMaleType;
use App\Repository\BalanceHormonaleMaleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/balance/hormonale/male")
 */
class BalanceHormonaleMaleController extends AbstractController
{
    /**
     * @Route("/", name="app_balance_hormonale_male_index", methods={"GET"})
     */
    public function index(BalanceHormonaleMaleRepository $balanceHormonaleMaleRepository): Response
    {
        return $this->render('balance_hormonale_male/index.html.twig', [
            'balance_hormonale_males' => $balanceHormonaleMaleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_balance_hormonale_male_new", methods={"GET", "POST"})
     */
    public function new(Request $request, BalanceHormonaleMaleRepository $balanceHormonaleMaleRepository): Response
    {
        $balanceHormonaleMale = new BalanceHormonaleMale();
        $form = $this->createForm(BalanceHormonaleMaleType::class, $balanceHormonaleMale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $balanceHormonaleMaleRepository->add($balanceHormonaleMale);
            return $this->redirectToRoute('app_balance_hormonale_male_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('balance_hormonale_male/new.html.twig', [
            'balance_hormonale_male' => $balanceHormonaleMale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_balance_hormonale_male_show", methods={"GET"})
     */
    public function show(BalanceHormonaleMale $balanceHormonaleMale): Response
    {
        return $this->render('balance_hormonale_male/show.html.twig', [
            'balance_hormonale_male' => $balanceHormonaleMale,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_balance_hormonale_male_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, BalanceHormonaleMale $balanceHormonaleMale, BalanceHormonaleMaleRepository $balanceHormonaleMaleRepository): Response
    {
        $form = $this->createForm(BalanceHormonaleMaleType::class, $balanceHormonaleMale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $balanceHormonaleMaleRepository->add($balanceHormonaleMale);
            return $this->redirectToRoute('app_balance_hormonale_male_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('balance_hormonale_male/edit.html.twig', [
            'balance_hormonale_male' => $balanceHormonaleMale,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_balance_hormonale_male_delete", methods={"POST"})
     */
    public function delete(Request $request, BalanceHormonaleMale $balanceHormonaleMale, BalanceHormonaleMaleRepository $balanceHormonaleMaleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$balanceHormonaleMale->getId(), $request->request->get('_token'))) {
            $balanceHormonaleMaleRepository->remove($balanceHormonaleMale);
        }

        return $this->redirectToRoute('app_balance_hormonale_male_index', [], Response::HTTP_SEE_OTHER);
    }
}
