<?php

namespace App\Controller;

use App\Entity\ProfilCouleursChakras;
use App\Form\ProfilCouleursChakrasType;
use App\Repository\ProfilCouleursChakrasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/couleurs/chakras")
 */
class ProfilCouleursChakrasController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_couleurs_chakras_index", methods={"GET"})
     */
    public function index(ProfilCouleursChakrasRepository $profilCouleursChakrasRepository): Response
    {
        return $this->render('profil_couleurs_chakras/index.html.twig', [
            'profil_couleurs_chakras' => $profilCouleursChakrasRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_couleurs_chakras_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilCouleursChakrasRepository $profilCouleursChakrasRepository): Response
    {
        $profilCouleursChakra = new ProfilCouleursChakras();
        $form = $this->createForm(ProfilCouleursChakrasType::class, $profilCouleursChakra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilCouleursChakrasRepository->add($profilCouleursChakra);
            return $this->redirectToRoute('app_profil_couleurs_chakras_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_couleurs_chakras/new.html.twig', [
            'profil_couleurs_chakra' => $profilCouleursChakra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_couleurs_chakras_show", methods={"GET"})
     */
    public function show(ProfilCouleursChakras $profilCouleursChakra): Response
    {
        return $this->render('profil_couleurs_chakras/show.html.twig', [
            'profil_couleurs_chakra' => $profilCouleursChakra,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_couleurs_chakras_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilCouleursChakras $profilCouleursChakra, ProfilCouleursChakrasRepository $profilCouleursChakrasRepository): Response
    {
        $form = $this->createForm(ProfilCouleursChakrasType::class, $profilCouleursChakra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilCouleursChakrasRepository->add($profilCouleursChakra);
            return $this->redirectToRoute('app_profil_couleurs_chakras_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_couleurs_chakras/edit.html.twig', [
            'profil_couleurs_chakra' => $profilCouleursChakra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_couleurs_chakras_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilCouleursChakras $profilCouleursChakra, ProfilCouleursChakrasRepository $profilCouleursChakrasRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilCouleursChakra->getId(), $request->request->get('_token'))) {
            $profilCouleursChakrasRepository->remove($profilCouleursChakra);
        }

        return $this->redirectToRoute('app_profil_couleurs_chakras_index', [], Response::HTTP_SEE_OTHER);
    }
}
