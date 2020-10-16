<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MasterController extends AbstractController
{
    /**
     * @Route("/master", name="master")
     */
    public function index()
    {
        return $this->render('master/index.html.twig', [
            'controller_name' => 'MasterController',
        ]);
    }
}
