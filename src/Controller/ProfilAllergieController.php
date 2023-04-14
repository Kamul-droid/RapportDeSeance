<?php

namespace App\Controller;

use App\Entity\life\ProfilAllergie;
use App\Form\ProfilAllergieType;
use App\Repository\ProfilAllergieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil/allergie")
 */
class ProfilAllergieController extends AbstractController
{
    /**
     * @Route("/", name="app_profil_allergie_index", methods={"GET"})
     */
    public function index(ProfilAllergieRepository $profilAllergieRepository): Response
    {
        return $this->render('profil_allergie/index.html.twig', [
            'profil_allergies' => $profilAllergieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profil_allergie_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfilAllergieRepository $profilAllergieRepository): Response
    {
        $profilAllergie = new ProfilAllergie();
        $form = $this->createForm(ProfilAllergieType::class, $profilAllergie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilAllergieRepository->add($profilAllergie);
            return $this->redirectToRoute('app_profil_allergie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_allergie/new.html.twig', [
            'profil_allergie' => $profilAllergie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_allergie_show", methods={"GET"})
     */
    public function show(ProfilAllergie $profilAllergie): Response
    {
        return $this->render('profil_allergie/show.html.twig', [
            'profil_allergie' => $profilAllergie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profil_allergie_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProfilAllergie $profilAllergie, ProfilAllergieRepository $profilAllergieRepository): Response
    {
        $form = $this->createForm(ProfilAllergieType::class, $profilAllergie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profilAllergieRepository->add($profilAllergie);
            return $this->redirectToRoute('app_profil_allergie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_allergie/edit.html.twig', [
            'profil_allergie' => $profilAllergie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_profil_allergie_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfilAllergie $profilAllergie, ProfilAllergieRepository $profilAllergieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilAllergie->getId(), $request->request->get('_token'))) {
            $profilAllergieRepository->remove($profilAllergie);
        }

        return $this->redirectToRoute('app_profil_allergie_index', [], Response::HTTP_SEE_OTHER);
    }
}
