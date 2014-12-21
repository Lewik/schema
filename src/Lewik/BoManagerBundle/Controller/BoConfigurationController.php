<?php

namespace Lewik\BoManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lewik\BoManagerBundle\Entity\BoConfiguration;
use Lewik\BoManagerBundle\Form\BoConfigurationType;

/**
 * BoConfiguration controller.
 *
 */
class BoConfigurationController extends Controller
{

    /**
     * Lists all BoConfiguration entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LewikBoManagerBundle:BoConfiguration')->findAll();

        return $this->render('LewikBoManagerBundle:BoConfiguration:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new BoConfiguration entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new BoConfiguration();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('boconfiguration_show', array('id' => $entity->getId())));
        }

        return $this->render('LewikBoManagerBundle:BoConfiguration:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a BoConfiguration entity.
     *
     * @param BoConfiguration $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(BoConfiguration $entity)
    {
        $form = $this->createForm(new BoConfigurationType(), $entity, array(
            'action' => $this->generateUrl('boconfiguration_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BoConfiguration entity.
     *
     */
    public function newAction()
    {
        $entity = new BoConfiguration();
        $form   = $this->createCreateForm($entity);

        return $this->render('LewikBoManagerBundle:BoConfiguration:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BoConfiguration entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LewikBoManagerBundle:BoConfiguration')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BoConfiguration entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LewikBoManagerBundle:BoConfiguration:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing BoConfiguration entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LewikBoManagerBundle:BoConfiguration')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BoConfiguration entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LewikBoManagerBundle:BoConfiguration:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a BoConfiguration entity.
    *
    * @param BoConfiguration $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BoConfiguration $entity)
    {
        $form = $this->createForm(new BoConfigurationType(), $entity, array(
            'action' => $this->generateUrl('boconfiguration_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BoConfiguration entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LewikBoManagerBundle:BoConfiguration')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BoConfiguration entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('boconfiguration_edit', array('id' => $id)));
        }

        return $this->render('LewikBoManagerBundle:BoConfiguration:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a BoConfiguration entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LewikBoManagerBundle:BoConfiguration')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BoConfiguration entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('boconfiguration'));
    }

    /**
     * Creates a form to delete a BoConfiguration entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('boconfiguration_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
