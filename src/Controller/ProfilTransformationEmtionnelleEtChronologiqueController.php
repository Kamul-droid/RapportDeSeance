<?php

namespace App\Controller;

use App\Entity\life\ProfilTransformationEmtionnelleEtChronologique;
use App\Form\ProfilTransformationEmtionnelleEtChronologiqueType;
use App\Repository\ProfilTransformationEmtionnelleEtChronologiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/transformation/emtionnelle/et/chronologique")
 */
class ProfilTransformationEmtionnelleEtChronologiqueController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_transformation_emtionnelle_et_chronologique_index", methods={"GET"})
     */
    public function index(ProfilTransformationEmtionnelleEtChronologiqueRepository $profilTransformationEmtionnelleEtChronologiqueRepository): Response
    {
        return $this->render('profil_transformation_emtionnelle_et_chronologique/index.html.twig', [
            'profil_transformation_emtionnelle_et_chronologiques' => $profilTransformationEmtionnelleEtChronologiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_transformation_emtionnelle_et_chronologique_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilTransformationEmtionnelleEtChronologiqueRepository $profilTransformationEmtionnelleEtChronologiqueRepository): Response
    {
        $profilTransformationEmtionnelleEtChronologique = new ProfilTransformationEmtionnelleEtChronologique();
        $form = $this->createForm(ProfilTransformationEmtionnelleEtChronologiqueType::class, $profilTransformationEmtionnelleEtChronologique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilTransformationEmtionnelleEtChronologiqueRepository->add($profilTransformationEmtionnelleEtChronologique);
            return $this->redirectToRoute('app_profil_transformation_emtionnelle_et_chronologique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_transformation_emtionnelle_et_chronologique/new.html.twig', [
            'profil_transformation_emtionnelle_et_chronologique' => $profilTransformationEmtionnelleEtChronologique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_transformation_emtionnelle_et_chronologique_show", methods={"GET"})
     */
    public function show(ProfilTransformationEmtionnelleEtChronologique $profilTransformationEmtionnelleEtChronologique): Response
    {
        return $this->render('profil_transformation_emtionnelle_et_chronologique/show.html.twig', [
            'profil_transformation_emtionnelle_et_chronologique' => $profilTransformationEmtionnelleEtChronologique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_transformation_emtionnelle_et_chronologique_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilTransformationEmtionnelleEtChronologique $profilTransformationEmtionnelleEtChronologique, ProfilTransformationEmtionnelleEtChronologiqueRepository $profilTransformationEmtionnelleEtChronologiqueRepository): Response
    {
        $form = $this->createForm(ProfilTransformationEmtionnelleEtChronologiqueType::class, $profilTransformationEmtionnelleEtChronologique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilTransformationEmtionnelleEtChronologiqueRepository->add($profilTransformationEmtionnelleEtChronologique);
            return $this->redirectToRoute('app_profil_transformation_emtionnelle_et_chronologique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_transformation_emtionnelle_et_chronologique/edit.html.twig', [
            'profil_transformation_emtionnelle_et_chronologique' => $profilTransformationEmtionnelleEtChronologique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_transformation_emtionnelle_et_chronologique_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilTransformationEmtionnelleEtChronologique $profilTransformationEmtionnelleEtChronologique, ProfilTransformationEmtionnelleEtChronologiqueRepository $profilTransformationEmtionnelleEtChronologiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilTransformationEmtionnelleEtChronologique->getId(), $request->request->get('_token'))) {
            $profilTransformationEmtionnelleEtChronologiqueRepository->remove($profilTransformationEmtionnelleEtChronologique);
        }

        return $this->redirectToRoute('app_profil_transformation_emtionnelle_et_chronologique_index', [], Response::HTTP_SEE_OTHER);
    }
}
