<?php

namespace App\Controller;

use App\Entity\life\TableALanger;
use App\Form\TableALangerType;
use App\Repository\TableALangerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/table/a/langer")
 */
class TableALangerController extends AbstractController
{
    /**
     * @Route("/", name="app_table_a_langer_index", methods={"GET"})
     */
    public function index(TableALangerRepository $tableALangerRepository): Response
    {
        return $this->render('table_a_langer/index.html.twig', [
            'table_a_langers' => $tableALangerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_table_a_langer_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TableALangerRepository $tableALangerRepository): Response
    {
        $tableALanger = new TableALanger();
        $form = $this->createForm(TableALangerType::class, $tableALanger);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tableALangerRepository->add($tableALanger);
            return $this->redirectToRoute('app_table_a_langer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('table_a_langer/new.html.twig', [
            'table_a_langer' => $tableALanger,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_table_a_langer_show", methods={"GET"})
     */
    public function show(TableALanger $tableALanger): Response
    {
        return $this->render('table_a_langer/show.html.twig', [
            'table_a_langer' => $tableALanger,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_table_a_langer_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, TableALanger $tableALanger, TableALangerRepository $tableALangerRepository): Response
    {
        $form = $this->createForm(TableALangerType::class, $tableALanger);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tableALangerRepository->add($tableALanger);
            return $this->redirectToRoute('app_table_a_langer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('table_a_langer/edit.html.twig', [
            'table_a_langer' => $tableALanger,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_table_a_langer_delete", methods={"POST"})
     */
    public function delete(Request $request, TableALanger $tableALanger, TableALangerRepository $tableALangerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tableALanger->getId(), $request->request->get('_token'))) {
            $tableALangerRepository->remove($tableALanger);
        }

        return $this->redirectToRoute('app_table_a_langer_index', [], Response::HTTP_SEE_OTHER);
    }
}
