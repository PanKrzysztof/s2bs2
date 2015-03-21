<?php

namespace BookWebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use BookWebBundle\Entity\Author;

/**
 * Author controller.
 *
 * @Route("/author")
 */
class AuthorController extends Controller
{

    /**
     * Lists all Author entities.
     *
     * @Route("/", name="author")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BookWebBundle:Author')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     *
     * @Route("/{id}", name="author_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookWebBundle:Author')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Author entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    

    /**
    * Creates a form to edit a Author entity.
    *
    * @param Author $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
//    private function createEditForm(Author $entity)
//    {
//        $form = $this->createForm(new AuthorType(), $entity, array(
//            'action' => $this->generateUrl('author_update', array('id' => $entity->getId())),
//            'method' => 'PUT',
//        ));
//
//        $form->add('submit', 'submit', array('label' => 'Update'));
//
//        return $form;
//    }
    

//    /**
//     * Creates a form to delete a Author entity by id.
//     *
//     * @param mixed $id The entity id
//     *
//     * @return \Symfony\Component\Form\Form The form
//     */
//    private function createDeleteForm($id)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('author_delete', array('id' => $id)))
//            ->setMethod('DELETE')
//            ->add('submit', 'submit', array('label' => 'Delete'))
//            ->getForm()
//        ;
//    }
}

