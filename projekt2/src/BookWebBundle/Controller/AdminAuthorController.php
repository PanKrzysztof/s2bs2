<?php

namespace BookWebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BookWebBundle\Entity\Author;
use Symfony\Component\Httpfoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

    /**
     * @Route("/admin/author")
     */
class AdminAuthorController extends Controller
{
    /**
     * @Route("/new")
     */
    public function newAction(Request $request)
    {
        $autor = new Author();
        $form = $this -> createFormBuilder($autor)
        ->add('Name')
        ->add('Surname', 'text')
        ->add('Sex', 'choice',array(
            'choices'=> array(
              0 => 'facet',
              1 => 'kobieta',
              2 => 'nieznany',
            )))
        ->add('birthYear', 'date')
        ->add('Isdead', 'checkbox', array(
            'required'=> false,
        ))
        ->add('Books', 'textarea')      
        ->getForm();
        $form->handleRequest($request);
        if ($form -> isValid())
        {
            $dm = $this ->getDoctrine()->getManager();
            $dm ->persist ($autor);
            $dm ->flush();
        }
        return $this->render('BookWebBundle:Default:new.html.twig', array('form' => $form->createView()));
    }
    /**
     *
     * @Route("/{id}/delete", name="author_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BookWebBundle:Author')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Author entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('author'));
    }

    /**
     * Edits an existing Author entity.
     *
     * @Route("/{id}/update", name="author_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookWebBundle:Author')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Author entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('author_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
}