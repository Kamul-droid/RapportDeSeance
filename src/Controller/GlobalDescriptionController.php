<?php

namespace App\Controller;

use App\Entity\GlobalDescription;
use App\Form\GlobalDescriptionType;
use App\Repository\GlobalDescriptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/global/description")
 */
class GlobalDescriptionController extends AbstractController
{
    /**
     * @Route("/", name="app_global_description_index", methods={"GET"})
     */
    public function index(GlobalDescriptionRepository $globalDescriptionRepository): Response
    {
        return $this->render('global_description/index.html.twig', [
            'global_descriptions' => $globalDescriptionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_global_description_new", methods={"GET", "POST"})
     */
    public function new(Request $request, GlobalDescriptionRepository $globalDescriptionRepository): Response
    {
        $globalDescription = new GlobalDescription();
        $form = $this->createForm(GlobalDescriptionType::class, $globalDescription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $globalDescriptionRepository->add($globalDescription);
            return $this->redirectToRoute('app_global_description_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('global_description/new.html.twig', [
            'global_description' => $globalDescription,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_global_description_show", methods={"GET"})
     */
    public function show(GlobalDescription $globalDescription): Response
    {
        return $this->render('global_description/show.html.twig', [
            'global_description' => $globalDescription,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_global_description_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, GlobalDescription $globalDescription, GlobalDescriptionRepository $globalDescriptionRepository): Response
    {
        $form = $this->createForm(GlobalDescriptionType::class, $globalDescription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $globalDescriptionRepository->add($globalDescription);
            return $this->redirectToRoute('app_global_description_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('global_description/edit.html.twig', [
            'global_description' => $globalDescription,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_global_description_delete", methods={"POST"})
     */
    public function delete(Request $request, GlobalDescription $globalDescription, GlobalDescriptionRepository $globalDescriptionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$globalDescription->getId(), $request->request->get('_token'))) {
            $globalDescriptionRepository->remove($globalDescription);
        }

        return $this->redirectToRoute('app_global_description_index', [], Response::HTTP_SEE_OTHER);
    }
}
