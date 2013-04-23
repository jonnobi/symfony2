<?php

namespace Lv\ShopaccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LvShopaccountBundle:Default:index.html.twig', array('name' => $name));
    }
}
