<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ImagesController extends AbstractController
{
    /**
     * @Route("/images", name="images")
     */
    public function index()
    {
        return $this->render('images/index.html.twig', [
            'controller_name' => 'ImagesController',
        ]);
    }
}
