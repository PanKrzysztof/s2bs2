<?php

namespace BookWebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BookWebBundle\Entity\Book;
use Symfony\Component\Httpfoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Validator\Constraints as Assert;

/**
     * @Route("/admin/book")
     */

class AdminBookController extends Controller {
    
    /**
     * @Route("/new")
    */

    public function newAction(Request $request) {
        
        $book = new Book();
        $form = $this -> createFormBuilder($book)
        -> add ("title",'text', array(
            'required'=>false
        ))
        -> add ("author", "entity", array(
            "class"=>"BookWebBundle:Author",
            "property"=>"surname") )
        -> add ("description", 'textarea')        
                 /**
      * @Assert\NotBlank()
      * @Assert\Type("\String")
      */
        -> add ("isbn",'text', array(
            'required'=>false
        ))            
        -> add ("publisher")  
        -> add ("version")
        -> add ("year",'date', array(
            'required'=>false
        ))        
      
        -> getForm();
        
        $form->handleRequest($request);
        if ($form->isValid()){
                $dm = $this->getDoctrine()->getManager();
                $dm->persist($book); 
                $dm->flush();
        
        }
        return $this->render('BookWebBundle::book.html.twig' , array ('form' => $form->createview() ));
        
    }
    /**
     *
     * @Route("/{id}/edit", name="book_edit")
     * @Method("GET")
     */
    
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookWebBundle:Book')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Book entity.');
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
     * Deletes a Book entity.
     *
     * @Route("/{id}/delete", name="book_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BookWebBundle:Book')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Book entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('book'));
    }
    }