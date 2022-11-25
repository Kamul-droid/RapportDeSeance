<?php

namespace App\Controller;

use App\Entity\PathogenesEtAutresSubstancesToxiques;
use App\Form\PathogenesEtAutresSubstancesToxiquesType;
use App\Repository\PathogenesEtAutresSubstancesToxiquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pathogenes/et/autres/substances/toxiques")
 */
class PathogenesEtAutresSubstancesToxiquesController extends AbstractController
{
    /**
     * @Route("/", name="app_pathogenes_et_autres_substances_toxiques_index", methods={"GET"})
     */
    public function index(PathogenesEtAutresSubstancesToxiquesRepository $pathogenesEtAutresSubstancesToxiquesRepository): Response
    {
        return $this->render('pathogenes_et_autres_substances_toxiques/index.html.twig', [
            'pathogenes_et_autres_substances_toxiques' => $pathogenesEtAutresSubstancesToxiquesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_pathogenes_et_autres_substances_toxiques_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PathogenesEtAutresSubstancesToxiquesRepository $pathogenesEtAutresSubstancesToxiquesRepository): Response
    {
        $pathogenesEtAutresSubstancesToxique = new PathogenesEtAutresSubstancesToxiques();
        $form = $this->createForm(PathogenesEtAutresSubstancesToxiquesType::class, $pathogenesEtAutresSubstancesToxique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pathogenesEtAutresSubstancesToxiquesRepository->add($pathogenesEtAutresSubstancesToxique);
            return $this->redirectToRoute('app_pathogenes_et_autres_substances_toxiques_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pathogenes_et_autres_substances_toxiques/new.html.twig', [
            'pathogenes_et_autres_substances_toxique' => $pathogenesEtAutresSubstancesToxique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_pathogenes_et_autres_substances_toxiques_show", methods={"GET"})
     */
    public function show(PathogenesEtAutresSubstancesToxiques $pathogenesEtAutresSubstancesToxique): Response
    {
        return $this->render('pathogenes_et_autres_substances_toxiques/show.html.twig', [
            'pathogenes_et_autres_substances_toxique' => $pathogenesEtAutresSubstancesToxique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_pathogenes_et_autres_substances_toxiques_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, PathogenesEtAutresSubstancesToxiques $pathogenesEtAutresSubstancesToxique, PathogenesEtAutresSubstancesToxiquesRepository $pathogenesEtAutresSubstancesToxiquesRepository): Response
    {
        $form = $this->createForm(PathogenesEtAutresSubstancesToxiquesType::class, $pathogenesEtAutresSubstancesToxique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pathogenesEtAutresSubstancesToxiquesRepository->add($pathogenesEtAutresSubstancesToxique);
            return $this->redirectToRoute('app_pathogenes_et_autres_substances_toxiques_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pathogenes_et_autres_substances_toxiques/edit.html.twig', [
            'pathogenes_et_autres_substances_toxique' => $pathogenesEtAutresSubstancesToxique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_pathogenes_et_autres_substances_toxiques_delete", methods={"POST"})
     */
    public function delete(Request $request, PathogenesEtAutresSubstancesToxiques $pathogenesEtAutresSubstancesToxique, PathogenesEtAutresSubstancesToxiquesRepository $pathogenesEtAutresSubstancesToxiquesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pathogenesEtAutresSubstancesToxique->getId(), $request->request->get('_token'))) {
            $pathogenesEtAutresSubstancesToxiquesRepository->remove($pathogenesEtAutresSubstancesToxique);
        }

        return $this->redirectToRoute('app_pathogenes_et_autres_substances_toxiques_index', [], Response::HTTP_SEE_OTHER);
    }
}
