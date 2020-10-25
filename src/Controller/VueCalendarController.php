<?php

namespace App\Controller;

use App\Repository\CalendarRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VueCalendarController extends AbstractController
{
    /**
     * @Route("/vue_calendar", name="vue_calendar")
     */
    //public function index()
    //{
      // / return $this->render('vue_calendar/index.html.twig', [
          //  'controller_name' => 'VueCalendarController',
        //]);
   // }
   public function index(CalendarRepository $calendar)
   {
       $events = $calendar->findAll();
       
       foreach($events as $event){
           
           $rdvs[] =[
               'id' => $event->getid(),
               'start' => $event->getstart()->format('Y-m-d H:i:s'),
               'end' => $event->getend()->format('Y-m-d H:i:s'),
               'title' => $event->gettitle(),
               'description' => $event->getdescription(),
               'backgroundColor' => $event->getbackgroundColor(),
               'borderColor' => $event->getborderColor(),
               'textColor' => $event->gettextColor(),
               'allDay' => $event->getallDay(),
            ]; 
        }
        
        $data = json_encode($rdvs);
        
        
        return $this->render('vue_calendar/index.html.twig',compact('data'));
    }
}
