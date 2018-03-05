<?php
/**
 * Created by PhpStorm.
 * User: glefevre
 * Date: 05/03/2018
 * Time: 11:59
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Cv controller.
 *
 * @Route("img")
 */
class ImageController extends Controller
{
    /**
     * Create or edit cv entity.
     *
     * @Route("/ajout/{id_user}", name="image_new")
     * @Method({"GET", "POST"})
     *
     * @Security("has_role('ROLE_USER')")
     */
    public function addAction(Request $request, $id_user)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($id_user != $user->getId()) {
            return $this->redirectToRoute('homepage');
        }
        $image =  new Image();
        $image->setUser($user);
        $form = $this->createForm('AppBundle\Form\ImageType', $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fileUploader = $this->get('app.image_uploader');
            $em = $this->getDoctrine()->getManager();

            $file = $image->getImage();
            $fileName = $fileUploader->upload($file);

            $image->setImage($fileName);

            $em->persist($image);
            $em->flush();

            return $this->redirectToRoute('fos_user_profile_show');
        }

        return $this->render('cv/new.html.twig', array(
            'image' => $image,
            'form' => $form->createView(),
        ));
    }

    /**
     *
     * @Route("/edit/{id_user}/{id}", name="image_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Image $image, $id_user)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($id_user != $user->getId()) {
            return $this->redirectToRoute('homepage');
        }
        $editForm = $this->createForm('AppBundle\Form\ImageType', $image);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $fileUploader = $this->get('app.image_uploader');
            $em = $this->getDoctrine()->getManager();

            $file = $image->getImage();
            $fileName = $fileUploader->upload($file);

            $image->setImage($fileName);

            $em->persist($image);
            $em->flush();

            return $this->redirectToRoute('fos_user_profile_show');
        }

        return $this->render('image/edit.html.twig', array(
            'image' => $image,
            'edit_form' => $editForm->createView()
        ));
    }

}