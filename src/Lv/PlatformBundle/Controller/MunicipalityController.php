<?php

namespace Lv\PlatformBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lv\PlatformBundle\Entity\Municipality;
use Lv\PlatformBundle\Form\MunicipalityType;

/**
 * Municipality controller.
 *
 */
class MunicipalityController extends Controller
{
    /**
     * Lists all Municipality entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LvPlatformBundle:Municipality')->findAll();

        return $this->render('LvPlatformBundle:Municipality:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Municipality entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvPlatformBundle:Municipality')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Municipality entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LvPlatformBundle:Municipality:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Municipality entity.
     *
     */
    public function newAction()
    {
        $entity = new Municipality();
        $form   = $this->createForm(new MunicipalityType(), $entity);

        return $this->render('LvPlatformBundle:Municipality:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Municipality entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Municipality();
        $form = $this->createForm(new MunicipalityType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lv_municipality_show', array('id' => $entity->getId())));
        }

        return $this->render('LvPlatformBundle:Municipality:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Municipality entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvPlatformBundle:Municipality')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Municipality entity.');
        }

        $editForm = $this->createForm(new MunicipalityType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LvPlatformBundle:Municipality:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Municipality entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvPlatformBundle:Municipality')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Municipality entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MunicipalityType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lv_municipality_edit', array('id' => $id)));
        }

        return $this->render('LvPlatformBundle:Municipality:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Municipality entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LvPlatformBundle:Municipality')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Municipality entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('lv_municipality'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
