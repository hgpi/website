<?php
/**
 * Created by PhpStorm.
 * User: glefevre
 * Date: 05/03/2018
 * Time: 11:26
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AnnuaireController extends Controller
{

    /**
     * @Route("/annuaire", name="annuaire")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:User')->findAll();
        return $this->render('annuaire/index.html.twig',array(
            'users' => $users
        ));
    }

    /**
     * @Route("/annuaire/{id}", name="show_annuaire")
     */
    public function showAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('AppBundle:User')->find($id);

        return $this->render('annuaire/show.html.twig', array(
            'user' => $user
        ));
    }

}