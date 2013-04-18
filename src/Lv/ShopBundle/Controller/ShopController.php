<?php

namespace Lv\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

    /**
     * 店舗一覧画面
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $page = $this->getRequest()->get('page', 1);

        $repo = $this->getDoctrine()->getManager()->getRepository('LvShopBundle:Shop');

        // 本部ID とりあえず１
        $shop_account_id = 1;
        // 1ページ最大表示件数　@var app\confi\config.ymlで定義
        $shops_per_page = $this->container->getParameter('max_shops_on_list');

        $paginator = $repo->getList(
                $shop_account_id, $shops_per_page, ($page - 1) * $shops_per_page);

        // 該当店舗総数
        $total_shops = $repo->getShopTotalCount();
        $last_page = ceil($total_shops / $shops_per_page);
        $previous_page = $page > 1 ? $page - 1 : 1;
        $next_page = $page < $last_page ? $page + 1 : $last_page;

        // ページ番号をセッションに保存.
        $session = $this->getRequest()->getSession();
        $session->set('page', $page);

        return $this->render('LvShopBundle:Shop:list.html.twig',
                array('shops' => $paginator,
                    'last_page' => $last_page,
                    'previous_page' => $previous_page,
                    'current_page' => $page,
                    'next_page' => $next_page,
                    'total_shops' => $total_shops
                ));
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

        $form = $this->createForm(new ShopType(), $this->get('session')->get('shop'))->createView();

        return $this->render(
                'LvShopBundle:Shop:input.html.twig',
                array(
                    'form' => $form,
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

            $shop = new Shop();
            $shop = $this->get('session')->get('shop');

            $em = $this->getDoctrine()->getManager();
            $em->merge($shop);  // persistでなくmergeを使用すること.
            $em->flush();

            $this->get('session')->remove('state');
            $this->get('session')->remove('shop');

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
        echo $this->get('session')->getFlash('registration') ."<br>";
        return $this->render(
            'LvShopBundle:Shop:success.html.twig',
            array(
                'registration' => $this->get('session')->getFlash('registration'),
            ));
    }

 }
