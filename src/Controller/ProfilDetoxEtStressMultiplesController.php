<?php

namespace App\Controller;

use App\Entity\ProfilDetoxEtStressMultiples;
use App\Form\ProfilDetoxEtStressMultiplesType;
use App\Repository\ProfilDetoxEtStressMultiplesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/detox/et/stress/multiples")
 */
class ProfilDetoxEtStressMultiplesController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_detox_et_stress_multiples_index", methods={"GET"})
     */
    public function index(ProfilDetoxEtStressMultiplesRepository $profilDetoxEtStressMultiplesRepository): Response
    {
        return $this->render('profil_detox_et_stress_multiples/index.html.twig', [
            'profil_detox_et_stress_multiples' => $profilDetoxEtStressMultiplesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_detox_et_stress_multiples_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilDetoxEtStressMultiplesRepository $profilDetoxEtStressMultiplesRepository): Response
    {
        $profilDetoxEtStressMultiple = new ProfilDetoxEtStressMultiples();
        $form = $this->createForm(ProfilDetoxEtStressMultiplesType::class, $profilDetoxEtStressMultiple);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilDetoxEtStressMultiplesRepository->add($profilDetoxEtStressMultiple);
            return $this->redirectToRoute('app_profil_detox_et_stress_multiples_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_detox_et_stress_multiples/new.html.twig', [
            'profil_detox_et_stress_multiple' => $profilDetoxEtStressMultiple,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_detox_et_stress_multiples_show", methods={"GET"})
     */
    public function show(ProfilDetoxEtStressMultiples $profilDetoxEtStressMultiple): Response
    {
        return $this->render('profil_detox_et_stress_multiples/show.html.twig', [
            'profil_detox_et_stress_multiple' => $profilDetoxEtStressMultiple,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_detox_et_stress_multiples_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilDetoxEtStressMultiples $profilDetoxEtStressMultiple, ProfilDetoxEtStressMultiplesRepository $profilDetoxEtStressMultiplesRepository): Response
    {
        $form = $this->createForm(ProfilDetoxEtStressMultiplesType::class, $profilDetoxEtStressMultiple);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilDetoxEtStressMultiplesRepository->add($profilDetoxEtStressMultiple);
            return $this->redirectToRoute('app_profil_detox_et_stress_multiples_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_detox_et_stress_multiples/edit.html.twig', [
            'profil_detox_et_stress_multiple' => $profilDetoxEtStressMultiple,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_detox_et_stress_multiples_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilDetoxEtStressMultiples $profilDetoxEtStressMultiple, ProfilDetoxEtStressMultiplesRepository $profilDetoxEtStressMultiplesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilDetoxEtStressMultiple->getId(), $request->request->get('_token'))) {
            $profilDetoxEtStressMultiplesRepository->remove($profilDetoxEtStressMultiple);
        }

        return $this->redirectToRoute('app_profil_detox_et_stress_multiples_index', [], Response::HTTP_SEE_OTHER);
    }
}
