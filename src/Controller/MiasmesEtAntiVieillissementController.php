<?php

namespace App\Controller;

use App\Entity\MiasmesEtAntiVieillissement;
use App\Form\MiasmesEtAntiVieillissementType;
use App\Repository\MiasmesEtAntiVieillissementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/miasmes/et/anti/vieillissement")
 */
class MiasmesEtAntiVieillissementController extends AbstractController
{
    /**
     * @Route("/", name="app_miasmes_et_anti_vieillissement_index", methods={"GET"})
     */
    public function index(MiasmesEtAntiVieillissementRepository $miasmesEtAntiVieillissementRepository): Response
    {
        return $this->render('miasmes_et_anti_vieillissement/index.html.twig', [
            'miasmes_et_anti_vieillissements' => $miasmesEtAntiVieillissementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_miasmes_et_anti_vieillissement_new", methods={"GET", "POST"})
     */
    public function new(Request $request, MiasmesEtAntiVieillissementRepository $miasmesEtAntiVieillissementRepository): Response
    {
        $miasmesEtAntiVieillissement = new MiasmesEtAntiVieillissement();
        $form = $this->createForm(MiasmesEtAntiVieillissementType::class, $miasmesEtAntiVieillissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $miasmesEtAntiVieillissementRepository->add($miasmesEtAntiVieillissement);
            return $this->redirectToRoute('app_miasmes_et_anti_vieillissement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('miasmes_et_anti_vieillissement/new.html.twig', [
            'miasmes_et_anti_vieillissement' => $miasmesEtAntiVieillissement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_miasmes_et_anti_vieillissement_show", methods={"GET"})
     */
    public function show(MiasmesEtAntiVieillissement $miasmesEtAntiVieillissement): Response
    {
        return $this->render('miasmes_et_anti_vieillissement/show.html.twig', [
            'miasmes_et_anti_vieillissement' => $miasmesEtAntiVieillissement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_miasmes_et_anti_vieillissement_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, MiasmesEtAntiVieillissement $miasmesEtAntiVieillissement, MiasmesEtAntiVieillissementRepository $miasmesEtAntiVieillissementRepository): Response
    {
        $form = $this->createForm(MiasmesEtAntiVieillissementType::class, $miasmesEtAntiVieillissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $miasmesEtAntiVieillissementRepository->add($miasmesEtAntiVieillissement);
            return $this->redirectToRoute('app_miasmes_et_anti_vieillissement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('miasmes_et_anti_vieillissement/edit.html.twig', [
            'miasmes_et_anti_vieillissement' => $miasmesEtAntiVieillissement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_miasmes_et_anti_vieillissement_delete", methods={"POST"})
     */
    public function delete(Request $request, MiasmesEtAntiVieillissement $miasmesEtAntiVieillissement, MiasmesEtAntiVieillissementRepository $miasmesEtAntiVieillissementRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$miasmesEtAntiVieillissement->getId(), $request->request->get('_token'))) {
            $miasmesEtAntiVieillissementRepository->remove($miasmesEtAntiVieillissement);
        }

        return $this->redirectToRoute('app_miasmes_et_anti_vieillissement_index', [], Response::HTTP_SEE_OTHER);
    }
}
