<?php
/**
 * Created by PhpStorm.
 * User: glefevre
 * Date: 06/03/2018
 * Time: 10:20
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Event controller.
 *
 * @Route("evenement")
 */
class EventController extends Controller
{

    /**
     * @Route("/", name="event")
     */
    public function indexAction(Request $request)
    {
        return $this->render('event/index.html.twig');
    }

    /**
     * Chargement des évenements.
     * @param Request $request
     *
     * @Route("/load")
     *
     */
    public function loadAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository('AppBundle:CalendarEvent')->findAll();
        $events = array();
        foreach($evenements as $event) {
            $serviceEvent = $this->get('app.fullcalendar_listener');
            $events[] = $serviceEvent->loadData($event);
        }
        return new JsonResponse($events);
    }

    /**
     * Edite un evenement par redimensionement
     * @param Request $request
     *
     * @Route("/resize}", name="resize_event")
     *
     * @return Response
     */
    public function resizeEventAction(Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $idEvent = $request->request->get('id');
            $startDate = $request->request->get('start');
            $endDate = $request->request->get('end');

            $em = $this->getDoctrine()->getManager();
            $rst = $em->getRepository('AppBundle:CalendarEvent')->resizeEvent($idEvent,$startDate,$endDate);

        }

        return new Response("Erreur.");
    }

    /**
     * Edite un évenement par glissement
     *
     * @Route("/drop}", name="drop_event")
     *
     * @param Request $request
     * @return Response
     */
    public function dropEventAction(Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $idEvent = $request->request->get('id');
            $startDate = $request->request->get('start');
            $endDate = $request->request->get('end');

            $em = $this->getDoctrine()->getManager();
            $rst = $em->getRepository('AppBundle:CalendarEvent')->dropEvent($idEvent,$startDate,$endDate);

        }

        return new Response("Erreur.");
    }

    /**
     * Suppression d'un évenement
     * @param Request $request
     *
     * @Route("/delete}", name="delete_event")
     *
     * @return Response
     */
    public function deleteEventAction(Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $idEvent = $request->request->get('id');

            $em = $this->getDoctrine()->getManager();
            $rst = $em->getRepository('AppBundle:CalendarEvent')->deleteEvent($idEvent);

        }

        return new Response("Erreur.");
    }


    /**
     * Edite un évenement par son titre et commentaire
     * @param Request $request
     *
     * @Route("/edit}", name="edit_event")
     *
     * @return Response
     */
    public function editEventAction(Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $idEvent = $request->request->get('id');
            $newTitle = $request->request->get('new_title');
            $newComm = $request->request->get('new_comm');

            $em = $this->getDoctrine()->getManager();
            $rst = $em->getRepository('AppBundle:CalendarEvent')->editEvent($idEvent, $newTitle, $newComm);

        }

        return new Response("Erreur.");
    }
}