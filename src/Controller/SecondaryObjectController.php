<?php

namespace App\Controller;

use App\Entity\SecondaryObject;
use App\Form\SecondaryObjectType;
use App\Repository\SecondaryObjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/secondary/object")
 */
class SecondaryObjectController extends AbstractController
{
    /**
     * @Route("/", name="app_secondary_object_index", methods={"GET"})
     */
    public function index(SecondaryObjectRepository $secondaryObjectRepository): Response
    {
        return $this->render('secondary_object/index.html.twig', [
            'secondary_objects' => $secondaryObjectRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_secondary_object_new", methods={"GET", "POST"})
     */
    public function new(Request $request, SecondaryObjectRepository $secondaryObjectRepository): Response
    {
        $secondaryObject = new SecondaryObject();
        $form = $this->createForm(SecondaryObjectType::class, $secondaryObject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $secondaryObjectRepository->add($secondaryObject);
            return $this->redirectToRoute('app_secondary_object_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('secondary_object/new.html.twig', [
            'secondary_object' => $secondaryObject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_secondary_object_show", methods={"GET"})
     */
    public function show(SecondaryObject $secondaryObject): Response
    {
        return $this->render('secondary_object/show.html.twig', [
            'secondary_object' => $secondaryObject,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_secondary_object_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, SecondaryObject $secondaryObject, SecondaryObjectRepository $secondaryObjectRepository): Response
    {
        $form = $this->createForm(SecondaryObjectType::class, $secondaryObject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $secondaryObjectRepository->add($secondaryObject);
            return $this->redirectToRoute('app_secondary_object_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('secondary_object/edit.html.twig', [
            'secondary_object' => $secondaryObject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_secondary_object_delete", methods={"POST"})
     */
    public function delete(Request $request, SecondaryObject $secondaryObject, SecondaryObjectRepository $secondaryObjectRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$secondaryObject->getId(), $request->request->get('_token'))) {
            $secondaryObjectRepository->remove($secondaryObject);
        }

        return $this->redirectToRoute('app_secondary_object_index', [], Response::HTTP_SEE_OTHER);
    }
}
