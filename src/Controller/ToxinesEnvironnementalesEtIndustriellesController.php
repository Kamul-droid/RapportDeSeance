<?php

namespace App\Controller;

use App\Entity\life\ToxinesEnvironnementalesEtIndustrielles;
use App\Form\ToxinesEnvironnementalesEtIndustriellesType;
use App\Repository\ToxinesEnvironnementalesEtIndustriellesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/toxines/environnementales/et/industrielles")
 */
class ToxinesEnvironnementalesEtIndustriellesController extends AbstractController
{
    /**
     * @Route("/", name="app_toxines_environnementales_et_industrielles_index", methods={"GET"})
     */
    public function index(ToxinesEnvironnementalesEtIndustriellesRepository $toxinesEnvironnementalesEtIndustriellesRepository): Response
    {
        return $this->render('toxines_environnementales_et_industrielles/index.html.twig', [
            'toxines_environnementales_et_industrielles' => $toxinesEnvironnementalesEtIndustriellesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_toxines_environnementales_et_industrielles_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ToxinesEnvironnementalesEtIndustriellesRepository $toxinesEnvironnementalesEtIndustriellesRepository): Response
    {
        $toxinesEnvironnementalesEtIndustrielle = new ToxinesEnvironnementalesEtIndustrielles();
        $form = $this->createForm(ToxinesEnvironnementalesEtIndustriellesType::class, $toxinesEnvironnementalesEtIndustrielle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $toxinesEnvironnementalesEtIndustriellesRepository->add($toxinesEnvironnementalesEtIndustrielle);
            return $this->redirectToRoute('app_toxines_environnementales_et_industrielles_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('toxines_environnementales_et_industrielles/new.html.twig', [
            'toxines_environnementales_et_industrielle' => $toxinesEnvironnementalesEtIndustrielle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_toxines_environnementales_et_industrielles_show", methods={"GET"})
     */
    public function show(ToxinesEnvironnementalesEtIndustrielles $toxinesEnvironnementalesEtIndustrielle): Response
    {
        return $this->render('toxines_environnementales_et_industrielles/show.html.twig', [
            'toxines_environnementales_et_industrielle' => $toxinesEnvironnementalesEtIndustrielle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_toxines_environnementales_et_industrielles_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ToxinesEnvironnementalesEtIndustrielles $toxinesEnvironnementalesEtIndustrielle, ToxinesEnvironnementalesEtIndustriellesRepository $toxinesEnvironnementalesEtIndustriellesRepository): Response
    {
        $form = $this->createForm(ToxinesEnvironnementalesEtIndustriellesType::class, $toxinesEnvironnementalesEtIndustrielle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $toxinesEnvironnementalesEtIndustriellesRepository->add($toxinesEnvironnementalesEtIndustrielle);
            return $this->redirectToRoute('app_toxines_environnementales_et_industrielles_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('toxines_environnementales_et_industrielles/edit.html.twig', [
            'toxines_environnementales_et_industrielle' => $toxinesEnvironnementalesEtIndustrielle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_toxines_environnementales_et_industrielles_delete", methods={"POST"})
     */
    public function delete(Request $request, ToxinesEnvironnementalesEtIndustrielles $toxinesEnvironnementalesEtIndustrielle, ToxinesEnvironnementalesEtIndustriellesRepository $toxinesEnvironnementalesEtIndustriellesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$toxinesEnvironnementalesEtIndustrielle->getId(), $request->request->get('_token'))) {
            $toxinesEnvironnementalesEtIndustriellesRepository->remove($toxinesEnvironnementalesEtIndustrielle);
        }

        return $this->redirectToRoute('app_toxines_environnementales_et_industrielles_index', [], Response::HTTP_SEE_OTHER);
    }
}
