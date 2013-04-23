<?php

namespace Lv\PlatformBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lv\PlatformBundle\Entity\Holiday;
use Lv\PlatformBundle\Form\HolidayType;

/**
 * Holiday controller.
 *
 */
class HolidayController extends Controller
{
    /**
     * Lists all Holiday entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LvPlatformBundle:Holiday')->findAll();

        return $this->render('LvPlatformBundle:Holiday:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Holiday entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvPlatformBundle:Holiday')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Holiday entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LvPlatformBundle:Holiday:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Holiday entity.
     *
     */
    public function newAction()
    {
        $entity = new Holiday();
        $form   = $this->createForm(new HolidayType(), $entity);

        return $this->render('LvPlatformBundle:Holiday:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Holiday entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Holiday();
        $form = $this->createForm(new HolidayType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lv_holiday_show', array('id' => $entity->getId())));
        }

        return $this->render('LvPlatformBundle:Holiday:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Holiday entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvPlatformBundle:Holiday')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Holiday entity.');
        }

        $editForm = $this->createForm(new HolidayType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LvPlatformBundle:Holiday:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Holiday entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvPlatformBundle:Holiday')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Holiday entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new HolidayType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lv_holiday_edit', array('id' => $id)));
        }

        return $this->render('LvPlatformBundle:Holiday:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Holiday entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LvPlatformBundle:Holiday')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Holiday entity.');
            }

            // 論理削除にする。
//            $em->remove($entity);
            $entity->setDeleted(new \DateTime());
            $em->persist($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('lv_holiday'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
