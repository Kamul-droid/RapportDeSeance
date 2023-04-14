<?php

namespace App\Controller;

use App\Entity\life\ProfilNutrition;
use App\Form\ProfilNutritionType;
use App\Repository\ProfilNutritionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/nutrition")
 */
class ProfilNutritionController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_nutrition_index", methods={"GET"})
     */
    public function index(ProfilNutritionRepository $profilNutritionRepository): Response
    {
        return $this->render('profil_nutrition/index.html.twig', [
            'profil_nutritions' => $profilNutritionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_nutrition_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilNutritionRepository $profilNutritionRepository): Response
    {
        $profilNutrition = new ProfilNutrition();
        $form = $this->createForm(ProfilNutritionType::class, $profilNutrition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilNutritionRepository->add($profilNutrition);
            return $this->redirectToRoute('app_profil_nutrition_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_nutrition/new.html.twig', [
            'profil_nutrition' => $profilNutrition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_nutrition_show", methods={"GET"})
     */
    public function show(ProfilNutrition $profilNutrition): Response
    {
        return $this->render('profil_nutrition/show.html.twig', [
            'profil_nutrition' => $profilNutrition,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_nutrition_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilNutrition $profilNutrition, ProfilNutritionRepository $profilNutritionRepository): Response
    {
        $form = $this->createForm(ProfilNutritionType::class, $profilNutrition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilNutritionRepository->add($profilNutrition);
            return $this->redirectToRoute('app_profil_nutrition_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_nutrition/edit.html.twig', [
            'profil_nutrition' => $profilNutrition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_nutrition_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilNutrition $profilNutrition, ProfilNutritionRepository $profilNutritionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilNutrition->getId(), $request->request->get('_token'))) {
            $profilNutritionRepository->remove($profilNutrition);
        }

        return $this->redirectToRoute('app_profil_nutrition_index', [], Response::HTTP_SEE_OTHER);
    }
}
