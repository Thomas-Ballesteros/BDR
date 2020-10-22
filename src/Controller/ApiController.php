<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiController extends AbstractController
{
    /**
     * @Route("/api", name="api")
     */
    public function index()
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
    /**
     * @Route("/api/{id}/edit", name="api_event_edit", methods={"PUT"})
     */
    public function majEvent(?Calendar $calendar, Request $request)
    {
        //on récupère les données
        $donnees = json_decode($request->getContent());

        if(
            isset($donnees->title) && !empty($donnees->title) &&
            isset($donnees->start) && !empty($donnees->start) &&
            isset($donnees->description) && !empty($donnees->description) &&
            isset($donnees->backgroundColor) && !empty($donnees->backgroundColor) &&
            isset($donnees->borderColor) && !empty($donnees->borderColor) &&
            isset($donnees->texteColor) && !empty($donnees->texteColor)
        )
            
            
            {

                
                // Les données sont complètes
                //on initialise un code
                $code = 200;
                // on verifie si l'id existe
                if(!$claendar){
                    //on instancie un rendez-vous
                    $calendar = new Calendar;
                    //on change le code
                    $code = 201;
                }
                //On hydrate l'objet avec les données
                $calendar->setTitle($donnees->title);
                $calendar->setDescription($donnees->description);
                $calendar->setstart(new DateTime ($donnees->start));
                $calendar->setTitle($donnees->title);
                if($donnees->allday){
                    $calendar->setend(new DateTime ($donnees->start));
                }
                else{
                    
                    $calendar->setend(new DateTime ($donnees->end));
                }
                $calendar->setAllday($donnees->allday);
                $calendar->setBackgroundColor($donnees->backgroundColor);
                $calendar->setBorderColor($donnees->borderColor);
                $calendar->setTexteColor($donnees->textColor);
                
                $em = $this->getDoctrine()->getmanager();
                $em->persist($calendar);
                $em->flush();
                //on retourne un code
                return new Response('ok', $code);
                
            }else{
                //les données sont incomplètes
                return new response('Données incomplète, 404');
            }



        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
}
