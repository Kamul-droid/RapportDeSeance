<?php

namespace App\Controller;

use App\Entity\SystemeDOrganes;
use App\Form\SystemeDOrganesType;
use App\Repository\SystemeDOrganesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/systeme/d/organes")
 */
class SystemeDOrganesController extends AbstractController
{
    /**
     * @Route("/", name="app_systeme_d_organes_index", methods={"GET"})
     */
    public function index(SystemeDOrganesRepository $systemeDOrganesRepository): Response
    {
        return $this->render('systeme_d_organes/index.html.twig', [
            'systeme_d_organes' => $systemeDOrganesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_systeme_d_organes_new", methods={"GET", "POST"})
     */
    public function new(Request $request, SystemeDOrganesRepository $systemeDOrganesRepository): Response
    {
        $systemeDOrgane = new SystemeDOrganes();
        $form = $this->createForm(SystemeDOrganesType::class, $systemeDOrgane);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $systemeDOrganesRepository->add($systemeDOrgane);
            return $this->redirectToRoute('app_systeme_d_organes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('systeme_d_organes/new.html.twig', [
            'systeme_d_organe' => $systemeDOrgane,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_systeme_d_organes_show", methods={"GET"})
     */
    public function show(SystemeDOrganes $systemeDOrgane): Response
    {
        return $this->render('systeme_d_organes/show.html.twig', [
            'systeme_d_organe' => $systemeDOrgane,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_systeme_d_organes_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, SystemeDOrganes $systemeDOrgane, SystemeDOrganesRepository $systemeDOrganesRepository): Response
    {
        $form = $this->createForm(SystemeDOrganesType::class, $systemeDOrgane);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $systemeDOrganesRepository->add($systemeDOrgane);
            return $this->redirectToRoute('app_systeme_d_organes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('systeme_d_organes/edit.html.twig', [
            'systeme_d_organe' => $systemeDOrgane,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_systeme_d_organes_delete", methods={"POST"})
     */
    public function delete(Request $request, SystemeDOrganes $systemeDOrgane, SystemeDOrganesRepository $systemeDOrganesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$systemeDOrgane->getId(), $request->request->get('_token'))) {
            $systemeDOrganesRepository->remove($systemeDOrgane);
        }

        return $this->redirectToRoute('app_systeme_d_organes_index', [], Response::HTTP_SEE_OTHER);
    }
}
