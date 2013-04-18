<?php

namespace Lv\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Lv\TestBundle\Entity\Shop;
use Lv\TestBundle\Form\Shop\ShopType;

/**
 * Shop controller.
 */
class ShopController extends Controller
{

    /**
     * Displays a form to create a new Shop entity.
     *
     */
    public function inputAction()
    {
        $entity = new Shop();
        $form   = $this->createForm(new ShopType(), $entity);

        return $this->render('LvTestBundle:Shop:input.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'formErrors' => false,
        ));
    }

    /**
     * Creates a new Shop entity.
     *
     */
    public function inputPostAction(Request $request)
    {
        $entity  = new Shop();
        $form = $this->createForm(new ShopType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->render('LvTestBundle:Shop:success.html.twig');
        }

        return $this->render('LvTestBundle:Shop:input.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
}
