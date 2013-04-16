<?php

namespace Lv\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Lv\ShopBundle\Entity\Shop;
use Lv\ShopBundle\Form\ShopType;

/**
 * Shop controller.
 */
class ShopController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LvShopBundle:Default:index.html.twig', array('name' => $name));
    }

    /**
     * Finds and displays a Shop entity.
     *
     */
    public function showAction($shop_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LvShopBundle:Shop')->find($shop_id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Shop entity.');
        }

        return $this->render('LvShopBundle:Shop:show.html.twig', array(
                'entity'      => $entity ));
//
//        $deleteForm = $this->createDeleteForm($shop_id);
//        return $this->render('ShopBundle:Shop:show.html.twig', array(
//            'entity'      => $entity,
//            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Shop entity.
     *
     */
    public function newAction()
    {
        $entity = new Shop();
        $form   = $this->createForm(new ShopType(), $entity);

        return $this->render('LvShopBundle:Shop:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Shop entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Shop();
        $form = $this->createForm(new ShopType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lv_shop_show', array('shop_id' => $entity->getShopId())));
        }

        return $this->render('LvShopBundle:Shop:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
}
