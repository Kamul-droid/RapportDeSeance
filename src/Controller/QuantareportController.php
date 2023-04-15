<?php

namespace App\Controller;

use App\Entity\QuanData;
use App\Form\QuanDataType;
use App\Entity\GlobalState;
use App\Entity\Quantareport;
use App\Entity\HealthHistory;
use App\Form\GlobalStateType;
use App\Form\QuantareportType;
use App\Form\HealthHistoryType;
use App\Repository\QuanDataRepository;
use App\Repository\GlobalStateRepository;
use App\Repository\QuantareportRepository;
use App\Repository\HealthHistoryRepository;
use App\Repository\PrimaryObjectRepository;
use App\Repository\SecondaryObjectRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/quantareport")
 */
class QuantareportController extends AbstractController
{
    /**
     * @Route("/", name="app_quantareport_index", methods={"GET"})
     */
    public function index(QuantareportRepository $quantareportRepository): Response
    {
        return $this->render('quantareport/index.html.twig', [
            'quantareports' => $quantareportRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_quantareport_new", methods={"GET", "POST"})
     */
    public function new(Request $request, QuantareportRepository $quantareportRepository, GlobalStateRepository $globalStateRepository, HealthHistoryRepository $healthHistoryRepository, QuanDataRepository $quanDataRepository, SecondaryObjectRepository $secObjectRep, PrimaryObjectRepository $primObjectRep): Response
    {
        $quantareport = new Quantareport();
        $form = $this->createForm(QuantareportType::class, $quantareport);
        $form->handleRequest($request);

        $quanDatum = new QuanData();
       
        $globalState = new GlobalState();
     
        $healthHistory = new HealthHistory();
       
        if ($form->isSubmitted() && $form->isValid()) {
            
            foreach ($quantareport ->getGstate() as $state){
                // $quantareport -> addGstate($state);
                $state->setQuantareport($quantareport);
                $globalStateRepository ->add($state);
                
            }
            foreach ($quantareport ->getHealth() as $health){
                // $quantareport -> addHealth($health);
                $health->setQuantareport($quantareport);
                $healthHistoryRepository->add($health);
                
            }
            foreach ($quantareport ->getQdata() as $data){
                // $quantareport -> addQdatum($data);
                $data->setQuantareport($quantareport);
                $quanDataRepository->add($data);
                
            }
            
            foreach ($quantareport ->getSobject() as $sobjet){
                $sobjet->setQuantareport($quantareport);
                $secObjectRep->add($sobjet);
            }
            foreach ($quantareport ->getPobject() as $pobjet){
                $pobjet->setQuantareport($quantareport);
                $primObjectRep->add($pobjet);
                
                
            }
            // $startd = $form->get('started_at');
            // dump($startd);
            // $quantareport -> setStartedAt();
            // $quantareport -> setEndedAt();
            // $quantareport ->setRdate();
           
            $quantareportRepository->add($quantareport);
            return $this->redirectToRoute('app_quantareport_index', [], Response::HTTP_SEE_OTHER);
        }
       
        return $this->render('quantareport/new.html.twig', [
            'quantareport' => $quantareport,
            'form' => $form->createView(),
            
        ]);
    }

    /**
     * @Route("/{id}", name="app_quantareport_show", methods={"GET"})
     */
    public function show(Quantareport $quantareport): Response
    {
        return $this->render('quantareport/show.html.twig', [
            'quantareport' => $quantareport,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_quantareport_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Quantareport $quantareport, QuantareportRepository $quantareportRepository): Response
    {
        $form = $this->createForm(QuantareportType::class, $quantareport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quantareportRepository->add($quantareport);
            return $this->redirectToRoute('app_quantareport_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('quantareport/edit.html.twig', [
            'quantareport' => $quantareport,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_quantareport_delete", methods={"POST"})
     */
    public function delete(Request $request, Quantareport $quantareport, QuantareportRepository $quantareportRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$quantareport->getId(), $request->request->get('_token'))) {
            $quantareportRepository->remove($quantareport);
        }

        return $this->redirectToRoute('app_quantareport_index', [], Response::HTTP_SEE_OTHER);
    }
}
