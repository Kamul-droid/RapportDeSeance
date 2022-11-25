<?php

namespace App\Controller;

use App\Entity\FicheClient;
use App\Entity\ProfilAcuMeridien;
use App\Form\FicheClientType;
use App\Repository\FicheClientRepository;
use App\Repository\ProfilAcuMeridienRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fiche/client")
 */
class FicheClientController extends AbstractController
{
    /**
     * @Route("/", name="app_fiche_client_index", methods={"GET"})
     */
    public function index(FicheClientRepository $ficheClientRepository): Response
    {
        return $this->render('fiche_client/index.html.twig', [
            'fiche_clients' => $ficheClientRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_fiche_client_new", methods={"GET", "POST"})
     */
    public function new(Request $request, FicheClientRepository $ficheClientRepository,ProfilAcuMeridienRepository $pamr): Response
    {
        $ficheClient = new FicheClient();
        $form = $this->createForm(FicheClientType::class, $ficheClient);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($ficheClient ->getAcupuncture() as $acupuncture){
                $acupuncture -> setFicheClient($ficheClient);
                $pamr->persist($acupuncture);

            }
            $ficheClientRepository->add($ficheClient);
            return $this->redirectToRoute('app_fiche_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fiche_client/new.html.twig', [
            'fiche_client' => $ficheClient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_fiche_client_show", methods={"GET"})
     */
    public function show(FicheClient $ficheClient): Response
    {
        return $this->render('fiche_client/show.html.twig', [
            'fiche_client' => $ficheClient,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_fiche_client_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, FicheClient $ficheClient, FicheClientRepository $ficheClientRepository): Response
    {
        $form = $this->createForm(FicheClientType::class, $ficheClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ficheClientRepository->add($ficheClient);
            return $this->redirectToRoute('app_fiche_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fiche_client/edit.html.twig', [
            'fiche_client' => $ficheClient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_fiche_client_delete", methods={"POST"})
     */
    public function delete(Request $request, FicheClient $ficheClient, FicheClientRepository $ficheClientRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ficheClient->getId(), $request->request->get('_token'))) {
            $ficheClientRepository->remove($ficheClient);
        }

        return $this->redirectToRoute('app_fiche_client_index', [], Response::HTTP_SEE_OTHER);
    }
}
