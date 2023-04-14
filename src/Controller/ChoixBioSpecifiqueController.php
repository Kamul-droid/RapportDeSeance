<?php

namespace App\Controller;

use App\Entity\life\ChoixBioSpecifique;
use App\Form\ChoixBioSpecifiqueType;
use App\Repository\ChoixBioSpecifiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/choix/bio/specifique")
 */
class ChoixBioSpecifiqueController extends AbstractController
{
    /**
     * @Route("/", name="app_choix_bio_specifique_index", methods={"GET"})
     */
    public function index(ChoixBioSpecifiqueRepository $choixBioSpecifiqueRepository): Response
    {
        return $this->render('choix_bio_specifique/index.html.twig', [
            'choix_bio_specifiques' => $choixBioSpecifiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_choix_bio_specifique_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ChoixBioSpecifiqueRepository $choixBioSpecifiqueRepository): Response
    {
        $choixBioSpecifique = new ChoixBioSpecifique();
        $form = $this->createForm(ChoixBioSpecifiqueType::class, $choixBioSpecifique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $choixBioSpecifiqueRepository->add($choixBioSpecifique);
            return $this->redirectToRoute('app_choix_bio_specifique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('choix_bio_specifique/new.html.twig', [
            'choix_bio_specifique' => $choixBioSpecifique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_choix_bio_specifique_show", methods={"GET"})
     */
    public function show(ChoixBioSpecifique $choixBioSpecifique): Response
    {
        return $this->render('choix_bio_specifique/show.html.twig', [
            'choix_bio_specifique' => $choixBioSpecifique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_choix_bio_specifique_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ChoixBioSpecifique $choixBioSpecifique, ChoixBioSpecifiqueRepository $choixBioSpecifiqueRepository): Response
    {
        $form = $this->createForm(ChoixBioSpecifiqueType::class, $choixBioSpecifique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $choixBioSpecifiqueRepository->add($choixBioSpecifique);
            return $this->redirectToRoute('app_choix_bio_specifique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('choix_bio_specifique/edit.html.twig', [
            'choix_bio_specifique' => $choixBioSpecifique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_choix_bio_specifique_delete", methods={"POST"})
     */
    public function delete(Request $request, ChoixBioSpecifique $choixBioSpecifique, ChoixBioSpecifiqueRepository $choixBioSpecifiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$choixBioSpecifique->getId(), $request->request->get('_token'))) {
            $choixBioSpecifiqueRepository->remove($choixBioSpecifique);
        }

        return $this->redirectToRoute('app_choix_bio_specifique_index', [], Response::HTTP_SEE_OTHER);
    }
}
