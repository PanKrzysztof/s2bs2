<?php

namespace BookWebBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use BookWebBundle\Entity\Publisher;
use BookWebBundle\Form\PublisherType;

/**
 * Publisher controller.
 *
 * @Route("/publisher")
 */
class PublisherController extends Controller
{

    /**
     * Lists all Publisher entities.
     *
     * @Route("/", name="publisher")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BookWebBundle:Publisher')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Publisher entity.
     *
     * @Route("/", name="publisher_create")
     * @Method("POST")
     * @Template("BookWebBundle:Publisher:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Publisher();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('publisher_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Publisher entity.
     *
     * @param Publisher $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Publisher $entity)
    {
        $form = $this->createForm(new PublisherType(), $entity, array(
            'action' => $this->generateUrl('publisher_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Publisher entity.
     *
     * @Route("/new", name="publisher_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Publisher();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Publisher entity.
     *
     * @Route("/{id}", name="publisher_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookWebBundle:Publisher')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Publisher entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    

    /**
    * Creates a form to edit a Publisher entity.
    *
    * @param Publisher $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Publisher $entity)
    {
        $form = $this->createForm(new PublisherType(), $entity, array(
            'action' => $this->generateUrl('publisher_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Publisher entity.
     *
     * @Route("/{id}", name="publisher_update")
     * @Method("PUT")
     * @Template("BookWebBundle:Publisher:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BookWebBundle:Publisher')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Publisher entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('publisher_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    

    /**
     * Creates a form to delete a Publisher entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('publisher_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
