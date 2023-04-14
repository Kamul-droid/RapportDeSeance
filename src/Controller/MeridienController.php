<?php

namespace App\Controller;

use App\Entity\life\Meridien;
use App\Form\MeridienType;
use App\Repository\MeridienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/meridien")
 */
class MeridienController extends AbstractController
{
    /**
     * @Route("/", name="app_meridien_index", methods={"GET"})
     */
    public function index(MeridienRepository $meridienRepository): Response
    {
        return $this->render('meridien/index.html.twig', [
            'meridiens' => $meridienRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_meridien_new", methods={"GET", "POST"})
     */
    public function new(Request $request, MeridienRepository $meridienRepository): Response
    {
        $meridien = new Meridien();
        $form = $this->createForm(MeridienType::class, $meridien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $meridienRepository->add($meridien);
            return $this->redirectToRoute('app_meridien_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('meridien/new.html.twig', [
            'meridien' => $meridien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_meridien_show", methods={"GET"})
     */
    public function show(Meridien $meridien): Response
    {
        return $this->render('meridien/show.html.twig', [
            'meridien' => $meridien,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_meridien_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Meridien $meridien, MeridienRepository $meridienRepository): Response
    {
        $form = $this->createForm(MeridienType::class, $meridien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $meridienRepository->add($meridien);
            return $this->redirectToRoute('app_meridien_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('meridien/edit.html.twig', [
            'meridien' => $meridien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_meridien_delete", methods={"POST"})
     */
    public function delete(Request $request, Meridien $meridien, MeridienRepository $meridienRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$meridien->getId(), $request->request->get('_token'))) {
            $meridienRepository->remove($meridien);
        }

        return $this->redirectToRoute('app_meridien_index', [], Response::HTTP_SEE_OTHER);
    }
}
