<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class HomepageController extends AbstractController
{
    
    
    /**
     * @Route("/", name="homepage")
     * 
     * 
     * 
     */

    //Public function __construct($twig){
       // $this->twig = $twig;
    //}
    public function index()
    {
        return   $this->render('homepage/index.html.twig', [
        'controller_name' => 'HomepageController',
        ]);
    }
}
