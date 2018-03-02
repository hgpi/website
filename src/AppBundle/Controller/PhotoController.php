<?php
/**
 * Created by PhpStorm.
 * User: glefevre
 * Date: 02/03/2018
 * Time: 16:11
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Photo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Photo controller.
 *
 * @Route("photo")
 */
class PhotoController extends Controller
{
//    /**
//     * Create or edit photo entity.
//     *
//     * @Route("/ajout/{id_user}", name="photo_new")
//     * @Method({"GET", "POST"})
//     *
//     * @Security("has_role('ROLE_USER')")
//     */
//    public function addAction(Request $request, $id_user)
//    {
//        $user = $this->get('security.token_storage')->getToken()->getUser();
//        if($id_user != $user->getId()) {
//            return $this->redirectToRoute('homepage');
//        }
//        $photo =  new Photo();
//        $photo->setUser($user);
//        $form = $this->createForm('AppBundle\Form\PhotoType', $photo);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $fileUploader = $this->get('app.file_uploader');
//            $em = $this->getDoctrine()->getManager();
//
//            $file = $photo->getPhoto();
//            $fileName = $fileUploader->upload($file);
//
//            $photo->setPhoto($fileName);
//
//            $em->persist($photo);
//            $em->flush();
//
//            return $this->redirectToRoute('fos_user_profile_show');
//        }
//
//        return $this->render('photo/new.html.twig', array(
//            'photo' => $photo,
//            'form' => $form->createView(),
//        ));
//    }

}