<?php

namespace App\Controller;

use App\Entity\PrimaryObject;
use App\Form\PrimaryObjectType;
use App\Repository\PrimaryObjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/primary/object")
 */
class PrimaryObjectController extends AbstractController
{
    /**
     * @Route("/", name="app_primary_object_index", methods={"GET"})
     */
    public function index(PrimaryObjectRepository $primaryObjectRepository): Response
    {
        return $this->render('primary_object/index.html.twig', [
            'primary_objects' => $primaryObjectRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_primary_object_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PrimaryObjectRepository $primaryObjectRepository): Response
    {
        $primaryObject = new PrimaryObject();
        $form = $this->createForm(PrimaryObjectType::class, $primaryObject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $primaryObjectRepository->add($primaryObject);
            return $this->redirectToRoute('app_primary_object_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('primary_object/new.html.twig', [
            'primary_object' => $primaryObject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_primary_object_show", methods={"GET"})
     */
    public function show(PrimaryObject $primaryObject): Response
    {
        return $this->render('primary_object/show.html.twig', [
            'primary_object' => $primaryObject,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_primary_object_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, PrimaryObject $primaryObject, PrimaryObjectRepository $primaryObjectRepository): Response
    {
        $form = $this->createForm(PrimaryObjectType::class, $primaryObject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $primaryObjectRepository->add($primaryObject);
            return $this->redirectToRoute('app_primary_object_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('primary_object/edit.html.twig', [
            'primary_object' => $primaryObject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_primary_object_delete", methods={"POST"})
     */
    public function delete(Request $request, PrimaryObject $primaryObject, PrimaryObjectRepository $primaryObjectRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$primaryObject->getId(), $request->request->get('_token'))) {
            $primaryObjectRepository->remove($primaryObject);
        }

        return $this->redirectToRoute('app_primary_object_index', [], Response::HTTP_SEE_OTHER);
    }
}
