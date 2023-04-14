<?php

namespace App\Controller;

use App\Entity\life\DetoxDuCorps;
use App\Form\DetoxDuCorpsType;
use App\Repository\DetoxDuCorpsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/detox/du/corps")
 */
class DetoxDuCorpsController extends AbstractController
{
    /**
     * @Route("/", name="app_detox_du_corps_index", methods={"GET"})
     */
    public function index(DetoxDuCorpsRepository $detoxDuCorpsRepository): Response
    {
        return $this->render('detox_du_corps/index.html.twig', [
            'detox_du_corps' => $detoxDuCorpsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_detox_du_corps_new", methods={"GET", "POST"})
     */
    public function new(Request $request, DetoxDuCorpsRepository $detoxDuCorpsRepository): Response
    {
        $detoxDuCorp = new DetoxDuCorps();
        $form = $this->createForm(DetoxDuCorpsType::class, $detoxDuCorp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $detoxDuCorpsRepository->add($detoxDuCorp);
            return $this->redirectToRoute('app_detox_du_corps_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('detox_du_corps/new.html.twig', [
            'detox_du_corp' => $detoxDuCorp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_detox_du_corps_show", methods={"GET"})
     */
    public function show(DetoxDuCorps $detoxDuCorp): Response
    {
        return $this->render('detox_du_corps/show.html.twig', [
            'detox_du_corp' => $detoxDuCorp,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_detox_du_corps_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, DetoxDuCorps $detoxDuCorp, DetoxDuCorpsRepository $detoxDuCorpsRepository): Response
    {
        $form = $this->createForm(DetoxDuCorpsType::class, $detoxDuCorp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $detoxDuCorpsRepository->add($detoxDuCorp);
            return $this->redirectToRoute('app_detox_du_corps_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('detox_du_corps/edit.html.twig', [
            'detox_du_corp' => $detoxDuCorp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_detox_du_corps_delete", methods={"POST"})
     */
    public function delete(Request $request, DetoxDuCorps $detoxDuCorp, DetoxDuCorpsRepository $detoxDuCorpsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$detoxDuCorp->getId(), $request->request->get('_token'))) {
            $detoxDuCorpsRepository->remove($detoxDuCorp);
        }

        return $this->redirectToRoute('app_detox_du_corps_index', [], Response::HTTP_SEE_OTHER);
    }
}
