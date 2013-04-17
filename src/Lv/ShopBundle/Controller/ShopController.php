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
    const STATE_INPUT = 'input';
    const STATE_CONFIRM = 'confirm';
    const STATE_SUCCESS = 'success';

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

        return $this->render(
                'LvShopBundle:Shop:show.html.twig',
                array(
                    'entity'      => $entity
                ));
//
//        $deleteForm = $this->createDeleteForm($shop_id);
//        return $this->render('ShopBundle:Shop:show.html.twig', array(
//            'entity'      => $entity,
//            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * 入力画面 Viewアクション
     */
    public function inputViewAction()
    {
        if (!$this->get('session')->has('state')) {
            $shop = new Shop();
            $this->get('session')->set('shop', $shop);
        }

        $this->get('session')->set('state', self::STATE_INPUT);

        return $this->render(
                'LvShopBundle:Shop:input.html.twig',
                array(
                    'form' => $this->createForm(new ShopType(), $this->get('session')->get('shop'))->createView(),
                    'formErrors' => false,
                ));
    }

    /**
     * 入力画面 Postアクション
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function inputPostAction()
    {
        if (!($this->get('session')->has('state')
              && $this->get('session')->get('state') == self::STATE_INPUT)) {
            throw $this->createNotFoundException();
        }

        $form = $this->createForm(new ShopType(), $this->get('session')->get('shop'));
        $form->bindRequest($this->getRequest());

        if ($form->isValid()) {
            // バリデーションOKなら確認画面へ遷移.
            $this->get('session')->set('state', self::STATE_CONFIRM);
            return $this->redirect($this->generateUrl('lv_shop_confirm', array(), true));
        }

        // 入力画面へ
        return $this->render(
                'LvShopBundle:Shop:input.html.twig',
                array(
                    'form' => $form->createView(),
                    'formErrors' => true,
                ));
    }

    /**
     * 入力確認 Viewアクション
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function confirmViewAction()
    {
        if (!($this->get('session')->has('state')
              && $this->get('session')->get('state') == self::STATE_CONFIRM)) {
            throw $this->createNotFoundException();
        }

        return $this->render(
                'LvShopBundle:Shop:confirm.html.twig',
                array(
                    'form' => $this->createFormBuilder()->getForm()->createView(),
                    'shop' => $this->get('session')->get('shop'),
                ));
    }

    /**
     * 入力確認 Postアクション
     *
     * DB保存を行います.
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function confirmPostAction()
    {
        if (!($this->get('session')->has('state')
              && $this->get('session')->get('state') == self::STATE_CONFIRM)) {
            throw $this->createNotFoundException();
        }

        $form = $this->createFormBuilder()->getForm();
        $form->bindRequest($this->getRequest());
        if ($form->isValid()) {
            if ($this->getRequest()->request->has('prev')) {
                return $this->redirect($this->generateUrl('lv_shop_input', array(), true));
            }

            $sessionShop = new Shop();
            $sessionShop = $this->get('session')->get('shop');
//            // 新しいオブジェクトにコピー
//            $shop = new Shop();
//            $shop->setShopAccount($sessionShop->getShopAccount());
//            $shop->setShopAccountId($sessionShop->getShopAccountId());
//            $shop->setPrefecture($sessionShop->getPrefecture());
//            $shop->setBusiness($sessionShop->getBusiness());
//            $shop->setCompanyName($sessionShop->getCompanyName());
//            $shop->setAddress($sessionShop->getAddress());
//            $targetPropertyList = get_class_vars(get_class($shop));
//var_dump($targetPropertyList);
//            foreach ($targetPropertyList as $key => $value) {
//                    if (property_exists($sessionShop, $key)) {
//                        $shop->$key = $sessionShop->$key;
//                    }
//            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($sessionShop);
//            $em->merge($shop);
            $em->flush();

            $this->get('session')->remove('state');
            $this->get('session')->remove('shop');
            $this->get('session')->setFlash('shop', $shop);
            $this->get('session')->setFlash('state', self::STATE_SUCCESS);
            return $this->redirect($this->generateUrl('lv_shop_success', array(), true));
        }

        return $this->render(
//                'LvShopBundle:Shop:confirm.html.twig',
                'LvShopBundle:Shop:input.html.twig',
                array(
                    'form' => $form->createView(),
                ));
    }


    /**
     * 登録完了画面
     * @return type
     */
    public function successAction()
    {
        if (!($this->get('session')->hasFlash('state')
              && $this->get('session')->getFlash('state') == self::STATE_SUCCESS)) {
            return $this->redirect('http://conference.kphpug.jp/2012');
        }

        return $this->render(
            'LvShopBundle:Shop:success.html.twig',
            array(
                'registration' => $this->get('session')->getFlash('registration'),
            ));
    }

 }
