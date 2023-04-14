<?php

namespace App\Controller;

use App\Entity\life\Chakra;
use App\Form\ChakraType;
use App\Repository\ChakraRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chakra")
 */
class ChakraController extends AbstractController
{
    /**
     * @Route("/", name="app_chakra_index", methods={"GET"})
     */
    public function index(ChakraRepository $chakraRepository): Response
    {
        return $this->render('chakra/index.html.twig', [
            'chakras' => $chakraRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_chakra_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ChakraRepository $chakraRepository): Response
    {
        $chakra = new Chakra();
        $form = $this->createForm(ChakraType::class, $chakra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chakraRepository->add($chakra);
            return $this->redirectToRoute('app_chakra_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('chakra/new.html.twig', [
            'chakra' => $chakra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_chakra_show", methods={"GET"})
     */
    public function show(Chakra $chakra): Response
    {
        return $this->render('chakra/show.html.twig', [
            'chakra' => $chakra,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_chakra_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Chakra $chakra, ChakraRepository $chakraRepository): Response
    {
        $form = $this->createForm(ChakraType::class, $chakra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chakraRepository->add($chakra);
            return $this->redirectToRoute('app_chakra_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('chakra/edit.html.twig', [
            'chakra' => $chakra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_chakra_delete", methods={"POST"})
     */
    public function delete(Request $request, Chakra $chakra, ChakraRepository $chakraRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chakra->getId(), $request->request->get('_token'))) {
            $chakraRepository->remove($chakra);
        }

        return $this->redirectToRoute('app_chakra_index', [], Response::HTTP_SEE_OTHER);
    }
}
