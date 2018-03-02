<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cv;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;



/**
 * Cv controller.
 *
 * @Route("cv")
 */
class CvController extends Controller
{
    /**
     * Lists all cv entities.
     *
     * @Route("/", name="cv_index")
     * @Method("GET")
     *
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cvs = $em->getRepository('AppBundle:Cv')->findAll();

        return $this->render('cv/index.html.twig', array(
            'cvs' => $cvs,
        ));
    }

    /**
     * Create or edit cv entity.
     *
     * @Route("/ajout/{id_user}", name="cv_new")
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
        $cv =  new Cv();
        $cv->setUser($user);
        $form = $this->createForm('AppBundle\Form\CvType', $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fileUploader = $this->get('app.file_uploader');
            $em = $this->getDoctrine()->getManager();

            $file = $cv->getCv();
            $fileName = $fileUploader->upload($file);

            $cv->setCv($fileName);

            $em->persist($cv);
            $em->flush();

            return $this->redirectToRoute('fos_user_profile_show');
        }

        return $this->render('cv/new.html.twig', array(
            'cv' => $cv,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cv entity.
     *
     * @Route("/edit/{id_user}/{id}", name="cv_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cv $cv, $id_user)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($id_user != $user->getId()) {
            return $this->redirectToRoute('homepage');
        }
        $deleteForm = $this->createDeleteForm($cv);
        $editForm = $this->createForm('AppBundle\Form\CvType', $cv);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $fileUploader = $this->get('app.file_uploader');
            $em = $this->getDoctrine()->getManager();

            $file = $cv->getCv();
            $fileUploader->remove($id_user);
            $fileName = $fileUploader->upload($file);

            $cv->setCv($fileName);

            $em->persist($cv);
            $em->flush();

            return $this->redirectToRoute('fos_user_profile_show');
        }

        return $this->render('cv/edit.html.twig', array(
            'cv' => $cv,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cv entity.
     *
     * @Route("/{id}", name="cv_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cv $cv)
    {
        $form = $this->createDeleteForm($cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cv);
            $em->flush();
        }

        return $this->redirectToRoute('cv_index');
    }

    /**
     * Creates a form to delete a cv entity.
     *
     * @param Cv $cv The cv entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cv $cv)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cv_delete', array('id' => $cv->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        return md5(uniqid());
    }
}
