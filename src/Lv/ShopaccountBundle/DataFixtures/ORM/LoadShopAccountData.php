<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lv\ShopaccountBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Lv\ShopaccountBundle\DataFixtures\ORM\LoadFixtureData;
use Lv\ShopaccountBundle\Entity\ShopAccount;


/**
 * Description of LoadShopAccountData
 */
class LoadShopAccountData extends LoadFixtureData implements OrderedFixtureInterface, FixtureInterface
{
    /**
     * @var Array シーケンス定義
     * 当ローダークラスで初期化するシーケンスを定義してください.
     */
    private static $tableSequenses = array(
        'shop_account' => 'shop_account_id',
    );

    /**
     * load
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // シーケンス初期化
        $this->initializeDbSequence($manager, self::$tableSequenses);

        $modelFixtures = $this->getModelFixtures();
        $now = new \DateTime();

        foreach ($modelFixtures['ShopAccount'] AS $index => $values)
        {
            $shopAccount = new ShopAccount();
            $shopAccount
                ->setUpdated($now)
                ->setCreated($now)
                ->setShopAccountName($values['shopAccountName'])
            ;
            $manager->persist($shopAccount);
            $this->setReference('ShopAccount_'. $index, $shopAccount);
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getModelFile()
    {
        return 'shop_account';
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 1000;
    }

}
