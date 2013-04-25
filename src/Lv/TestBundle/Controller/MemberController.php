<?php

namespace Lv\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lv\TestBundle\Entity\Member;
use Lv\TestBundle\Form\MemberType;

/**
 * Member controller.
 *
 */
class MemberController extends Controller
{
    /**
     * Lists all Member entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LvTestBundle:Member')->findAll();

        return $this->render('LvTestBundle:Member:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Member entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvTestBundle:Member')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Member entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LvTestBundle:Member:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Member entity.
     *
     */
    public function newAction()
    {
        $entity = new Member();
        $form   = $this->createForm(new MemberType(), $entity);

        return $this->render('LvTestBundle:Member:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Member entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Member();
        $form = $this->createForm(new MemberType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lv_test_member_show', array('id' => $entity->getId())));
        }

        return $this->render('LvTestBundle:Member:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Member entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvTestBundle:Member')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Member entity.');
        }

        $editForm = $this->createForm(new MemberType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LvTestBundle:Member:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Member entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvTestBundle:Member')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Member entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MemberType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lv_test_member_edit', array('id' => $id)));
        }

        return $this->render('LvTestBundle:Member:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Member entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LvTestBundle:Member')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Member entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('lv_test_member'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
