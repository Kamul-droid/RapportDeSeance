<?php

namespace App\Controller;

use App\Entity\life\ProfilChromosomesEtGenes;
use App\Form\ProfilChromosomesEtGenesType;
use App\Repository\ProfilChromosomesEtGenesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/chromosomes/et/genes")
 */
class ProfilChromosomesEtGenesController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_chromosomes_et_genes_index", methods={"GET"})
     */
    public function index(ProfilChromosomesEtGenesRepository $profilChromosomesEtGenesRepository): Response
    {
        return $this->render('profil_chromosomes_et_genes/index.html.twig', [
            'profil_chromosomes_et_genes' => $profilChromosomesEtGenesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_chromosomes_et_genes_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilChromosomesEtGenesRepository $profilChromosomesEtGenesRepository): Response
    {
        $profilChromosomesEtGene = new ProfilChromosomesEtGenes();
        $form = $this->createForm(ProfilChromosomesEtGenesType::class, $profilChromosomesEtGene);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilChromosomesEtGenesRepository->add($profilChromosomesEtGene);
            return $this->redirectToRoute('app_profil_chromosomes_et_genes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_chromosomes_et_genes/new.html.twig', [
            'profil_chromosomes_et_gene' => $profilChromosomesEtGene,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_chromosomes_et_genes_show", methods={"GET"})
     */
    public function show(ProfilChromosomesEtGenes $profilChromosomesEtGene): Response
    {
        return $this->render('profil_chromosomes_et_genes/show.html.twig', [
            'profil_chromosomes_et_gene' => $profilChromosomesEtGene,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_chromosomes_et_genes_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilChromosomesEtGenes $profilChromosomesEtGene, ProfilChromosomesEtGenesRepository $profilChromosomesEtGenesRepository): Response
    {
        $form = $this->createForm(ProfilChromosomesEtGenesType::class, $profilChromosomesEtGene);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilChromosomesEtGenesRepository->add($profilChromosomesEtGene);
            return $this->redirectToRoute('app_profil_chromosomes_et_genes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_chromosomes_et_genes/edit.html.twig', [
            'profil_chromosomes_et_gene' => $profilChromosomesEtGene,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_chromosomes_et_genes_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilChromosomesEtGenes $profilChromosomesEtGene, ProfilChromosomesEtGenesRepository $profilChromosomesEtGenesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilChromosomesEtGene->getId(), $request->request->get('_token'))) {
            $profilChromosomesEtGenesRepository->remove($profilChromosomesEtGene);
        }

        return $this->redirectToRoute('app_profil_chromosomes_et_genes_index', [], Response::HTTP_SEE_OTHER);
    }
}
