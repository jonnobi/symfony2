<?php

namespace Lv\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lv\ShopBundle\Entity\Shop;
use Lv\ShopBundle\Form\ShopType;

/**
 * Shop controller.
 *
 * 2013.04.23
 *  例外：Entities passed to the choice field must be managed が発生する対応として、
 *       フォーム作成時に、persistするようにした.
 *       (参考)http://stackoverflow.com/questions/12056630/symfony2-entities-passed-to-the-choice-field-must-be-managed
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
    public function listAction()
    {
        $page = $this->getRequest()->get('page', 1);

        $repo = $this->getDoctrine()->getManager()->getRepository('LvShopBundle:Shop');

        // 本部ID とりあえず１
        $shop_account_id = 1;

        // 1ページ最大表示件数
        $shops_per_page = $this->container->getParameter('max_shops_on_list');

        $paginator = $repo->getList(
                $shop_account_id,
                $shops_per_page,
                ($page - 1) * $shops_per_page
                );

        // 該当店舗総数
        $total_shops = $repo->getShopTotalCount();
        $last_page = ceil($total_shops / $shops_per_page);
        $previous_page = $page > 1 ? $page - 1 : 1;
        $next_page = $page < $last_page ? $page + 1 : $last_page;

        // ページ番号をセッションに保存.
        $this->get('session')->set('page', $page);

        return $this->render('LvShopBundle:Shop:list.html.twig',
                array(
                    'shops' => $paginator,
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
    public function detailAction($shop_id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LvShopBundle:Shop')->getShopDetail($shop_id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Shop entity.');
        }

        return $this->render(
                'LvShopBundle:Shop:detail.html.twig',
                array(
                    'shop'  => $entity
                )
        );
//
//        $deleteForm = $this->createDeleteForm($shop_id);
//        return $this->render('ShopBundle:Shop:show.html.twig', array(
//            'entity'      => $entity,
//            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * 編集アクション
     * @param intger $shop_id
     */
    public function editViewAction($shop_id)
    {
        $em = $this->getDoctrine()->getManager();
        $shop = $em->getRepository('LvShopBundle:Shop')->getShopDetail($shop_id);
        if (!$shop) {
            throw $this->createNotFoundException('Unable to find Shop entity.');
        }

        $this->get('session')->set('shop', $shop);
        $this->get('session')->set('state', self::STATE_INPUT);

        // 入力画面へ遷移
        return $this->redirect($this->generateUrl('lv_shop_input', array(), true));
    }

    /**
     * 入力画面 Viewアクション
     */
    public function inputViewAction()
    {
//        echo $this->getRequest()->getPreferredLanguage() . "<br>";
//        $this->get('session')->set('_locale', $this->getRequest()->getPreferredLanguage());

        if (!$this->get('session')->has('state')) {
            $shop = new Shop();
            $this->get('session')->set('shop', $shop);
        } else {
            $shop = $this->get('session')->get('shop');
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($shop->getShopAccount());
        $em->persist($shop->getBusiness());
        $em->persist($shop->getPrefecture());

        $form = $this->createForm(new ShopType(), $shop);
        $this->get('session')->set('state', self::STATE_INPUT);

        return $this->render(
                'LvShopBundle:Shop:input.html.twig',
                array(
                    'form' => $form->createView(),
                    'shop' => $this->get('session')->get('shop'),
                    'formErrors' => false,
                )
        );
    }

     /**
     * 入力画面 Postアクション
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function inputPostAction()
    {
//        echo $this->getRequest()->getPreferredLanguage() . "<br>";
//        $this->get('session')->set('_locale', $this->getRequest()->getPreferredLanguage());

        if (!($this->get('session')->has('state')
              && $this->get('session')->get('state') == self::STATE_INPUT)) {
            throw $this->createNotFoundException();
        }

        $shop = $this->get('session')->get('shop');

        //未入力の場合、nullをpersistしエラーとなるので、コメントアウト.
        $em = $this->getDoctrine()->getManager();
        if ($shop->getShopAccount()) {
            $em->persist($shop->getShopAccount());
        }
        if ($shop->getBusiness()) {
            $em->persist($shop->getBusiness());
        }
        if ($shop->getPrefecture()) {
            $em->persist($shop->getPrefecture());
        }

        $form = $this->createForm(new ShopType(), $shop);
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
                    'shop' => $this->get('session')->get('shop'),
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

            $shop = $this->get('session')->get('shop');
            $em = $this->getDoctrine()->getManager();
            // リダイレクト後は、EntityManagerがデタッチされているので
            // merge すること。
            $em->merge($shop);
            $em->flush();

            $this->get('session')->remove('state');
            $this->get('session')->remove('shop');
            $this->get('session')->setFlash('shop', $shop);
            $this->get('session')->setFlash('state', self::STATE_SUCCESS);

            return $this->redirect($this->generateUrl('lv_shop_success', array(), true));
        }

        return $this->render(
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
