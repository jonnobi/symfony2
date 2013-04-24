<?php

namespace Lv\PlatformBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lv\PlatformBundle\Entity\Prefecture;
use Lv\PlatformBundle\Form\PrefectureType;

/**
 * Prefecture controller.
 *
 */
class PrefectureController extends Controller
{
    /**
     * Lists all Prefecture entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LvPlatformBundle:Prefecture')->findAll();

        return $this->render('LvPlatformBundle:Prefecture:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Prefecture entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvPlatformBundle:Prefecture')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prefecture entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LvPlatformBundle:Prefecture:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Prefecture entity.
     *
     */
    public function newAction()
    {
        $entity = new Prefecture();
        $form   = $this->createForm(new PrefectureType(), $entity);

        return $this->render('LvPlatformBundle:Prefecture:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Prefecture entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Prefecture();
        $form = $this->createForm(new PrefectureType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lv_prefecture_show', array('id' => $entity->getId())));
        }

        return $this->render('LvPlatformBundle:Prefecture:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Prefecture entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvPlatformBundle:Prefecture')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prefecture entity.');
        }

        $editForm = $this->createForm(new PrefectureType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LvPlatformBundle:Prefecture:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Prefecture entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvPlatformBundle:Prefecture')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prefecture entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PrefectureType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lv_prefecture_edit', array('id' => $id)));
        }

        return $this->render('LvPlatformBundle:Prefecture:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Prefecture entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LvPlatformBundle:Prefecture')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Prefecture entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('lv_prefecture'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
