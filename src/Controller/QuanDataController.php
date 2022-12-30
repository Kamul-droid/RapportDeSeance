<?php

namespace App\Controller;

use App\Entity\QuanData;
use App\Form\QuanDataType;
use App\Repository\QuanDataRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/quan/data")
 */
class QuanDataController extends AbstractController
{
    /**
     * @Route("/", name="app_quan_data_index", methods={"GET"})
     */
    public function index(QuanDataRepository $quanDataRepository): Response
    {
        return $this->render('quan_data/index.html.twig', [
            'quan_datas' => $quanDataRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_quan_data_new", methods={"GET", "POST"})
     */
    public function new(Request $request, QuanDataRepository $quanDataRepository): Response
    {
        $quanDatum = new QuanData();
        $form = $this->createForm(QuanDataType::class, $quanDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quanDataRepository->add($quanDatum);
            return $this->redirectToRoute('app_quan_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('quan_data/new.html.twig', [
            'quan_datum' => $quanDatum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_quan_data_show", methods={"GET"})
     */
    public function show(QuanData $quanDatum): Response
    {
        return $this->render('quan_data/show.html.twig', [
            'quan_datum' => $quanDatum,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_quan_data_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, QuanData $quanDatum, QuanDataRepository $quanDataRepository): Response
    {
        $form = $this->createForm(QuanDataType::class, $quanDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quanDataRepository->add($quanDatum);
            return $this->redirectToRoute('app_quan_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('quan_data/edit.html.twig', [
            'quan_datum' => $quanDatum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_quan_data_delete", methods={"POST"})
     */
    public function delete(Request $request, QuanData $quanDatum, QuanDataRepository $quanDataRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$quanDatum->getId(), $request->request->get('_token'))) {
            $quanDataRepository->remove($quanDatum);
        }

        return $this->redirectToRoute('app_quan_data_index', [], Response::HTTP_SEE_OTHER);
    }
}
