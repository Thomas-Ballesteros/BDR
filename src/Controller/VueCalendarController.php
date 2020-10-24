<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VueCalendarController extends AbstractController
{
    /**
     * @Route("/vue_calendar", name="vue_calendar")
     */
    public function index()
    {
        return $this->render('vue_calendar/index.html.twig', [
            'controller_name' => 'VueCalendarController',
        ]);
    }
}
