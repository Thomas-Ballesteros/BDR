<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UniverseController extends AbstractController
{
    /**
     * @Route("/universe", name="universe")
     */
    public function index()
    {
        return $this->render('universe/index.html.twig', [
            'controller_name' => 'UniverseController',
        ]);
    }
}
