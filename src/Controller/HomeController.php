<?php

namespace App\Controller;

use App\Form\FillType;
use App\Form\ProfilOreillesYeuxType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    // /**
    //  * @Route("/", name="app_login")
    //  */

    // public function home():Response
    // {
    //     return $this->render('security/login.html.twig', [

    //     ]);

    // }

    /**
     * @Route("/home", name="app_home")
     */

    public function index(): Response
    {
        return $this->render('choice.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    
    /**
     * @Route("/quantaform", name="app_quantaf")
     */

    public function qf(): Response
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/lifeform", name="app_life")
     */

    public function lif(): Response
    {
        return $this->render('choice.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }



    /**
     * @Route("/fillform", name="app_fill")
     */

    public function fill(Request $request):Response
    {
        $form = $this->createForm(FillType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('fill.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}
