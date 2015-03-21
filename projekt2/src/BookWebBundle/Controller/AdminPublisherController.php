<?php

namespace BookWebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BookWebBundle\Entity\Publisher;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


    /**
     * @Route("/admin/publisher")
     */

class AdminPublisherController extends Controller {
    
    /**
     * @Route("/new")
    */

    public function newAction(Request $request) {
        
        $publisher = new Publisher();
        $form = $this -> createFormBuilder($publisher)
        -> add ("name",'text',array(
            'required'=>false
        ))
        -> add ("books")
        
        -> getForm();
        $form->handleRequest($request);
        if ($form->isValid()){
                $dm = $this->getDoctrine()->getManager();
                $dm->persist($publisher); 
                $dm->flush();
        }
        return $this->render('BookWebBundle::publisher.html.twig' , array ('form' => $form->createview() ));
        
    }
    /**
     * @Route("/{id}/edit", name="publisher_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BookWebBundle:Publisher')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Publisher entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     *
     * @Route("/{id}", name="publisher_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BookWebBundle:Publisher')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Publisher entity.');
            }

            $em->remove($entity);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('publisher'));
    }
    }