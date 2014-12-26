<?php

namespace Lewik\BoManagerBundle\Controller;

use Lewik\BoManagerBundle\Entity\BoConfiguration;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lewik\BoManagerBundle\Entity\BoFieldConfiguration;
use Lewik\BoManagerBundle\Form\BoFieldConfigurationType;

/**
 * BoFieldConfiguration controller.
 *
 */
class BoFieldConfigurationController extends Controller
{

    /**
     * Lists all BoFieldConfiguration entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LewikBoManagerBundle:BoFieldConfiguration')->findAll();

        return $this->render('LewikBoManagerBundle:BoFieldConfiguration:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new BoFieldConfiguration entity.
     *
     */
    public function createAction(BoConfiguration $boConfiguration, Request $request)
    {
        $entity = new BoFieldConfiguration();
        $entity->setBo($boConfiguration);
        $form = $this->createCreateForm($entity, $boConfiguration);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('boconfiguration_edit', array('id' => $boConfiguration->getId())));
        }

        return $this->render('LewikBoManagerBundle:BoFieldConfiguration:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a BoFieldConfiguration entity.
     *
     * @param BoFieldConfiguration $entity The entity
     *
     * @param BoConfiguration $boConfiguration
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(BoFieldConfiguration $entity, BoConfiguration $boConfiguration)
    {
        $form = $this->createForm(new BoFieldConfigurationType(), $entity, [
            'action' => $this->generateUrl('bofieldconfiguration_create', ['boConfiguration' => $boConfiguration->getId()]),
            'method' => 'POST',
        ]);

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BoFieldConfiguration entity.
     * @param BoConfiguration $boConfiguration
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(BoConfiguration $boConfiguration)
    {
        $entity = new BoFieldConfiguration();
        $entity->setBo($boConfiguration);
        $form   = $this->createCreateForm($entity, $boConfiguration);

        return $this->render('LewikBoManagerBundle:BoFieldConfiguration:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BoFieldConfiguration entity.
     *
     */
    public function showAction($id)
    {
//        $em = $this->getDoctrine()->getManager();
//
//        $entity = $em->getRepository('LewikBoManagerBundle:BoFieldConfiguration')->find($id);
//
//        if (!$entity) {
//            throw $this->createNotFoundException('Unable to find BoFieldConfiguration entity.');
//        }
//
//        $deleteForm = $this->createDeleteForm($id);
//
//        return $this->render('LewikBoManagerBundle:BoFieldConfiguration:show.html.twig', array(
//            'entity'      => $entity,
//            'delete_form' => $deleteForm->createView(),
//        ));
    }

    /**
     * Displays a form to edit an existing BoFieldConfiguration entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LewikBoManagerBundle:BoFieldConfiguration')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BoFieldConfiguration entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LewikBoManagerBundle:BoFieldConfiguration:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a BoFieldConfiguration entity.
    *
    * @param BoFieldConfiguration $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BoFieldConfiguration $entity)
    {
        $form = $this->createForm(new BoFieldConfigurationType(), $entity, array(
            'action' => $this->generateUrl('bofieldconfiguration_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BoFieldConfiguration entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LewikBoManagerBundle:BoFieldConfiguration')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BoFieldConfiguration entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('bofieldconfiguration_edit', array('id' => $id)));
        }

        return $this->render('LewikBoManagerBundle:BoFieldConfiguration:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a BoFieldConfiguration entity.
     *
     */
    public function deleteAction(Request $request, BoFieldConfiguration $boFieldConfiguration)
    {


        $boId = $boFieldConfiguration->getBo()->getId();


            $em = $this->getDoctrine()->getManager();

            if (!$boFieldConfiguration) {
                throw $this->createNotFoundException('Unable to find BoFieldConfiguration entity.');
            }

            $em->remove($boFieldConfiguration);
            $em->flush();


        return $this->redirect($this->generateUrl('boconfiguration_edit', array('id' => $boId)));
    }


}
