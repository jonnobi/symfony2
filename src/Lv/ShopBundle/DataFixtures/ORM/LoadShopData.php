<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lv\ShopBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Lv\ShopBundle\DataFixtures\ORM\LoadFixtureData;
use Lv\ShopBundle\Entity\Shop;


/**
 * Description of LoadShopData
 */
class LoadShopData extends LoadFixtureData implements OrderedFixtureInterface, FixtureInterface
{
    /**
     * @var Array シーケンス定義
     * 当ローダークラスで初期化するシーケンスを定義してください.
     */
    private static $tableSequenses = array(
        'shop' => 'shop_id',
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

        foreach ($modelFixtures['Shop'] AS $index => $values)
        {
            $shopAccount = $this->getReference('ShopAccount_' .$values['shopAccountIndex']);
            $business = $this->getReference('Business_' .$values['businessIndex']);
            $prefecture = $this->getReference('Prefecture_' .$values['prefectureId']);

            if (is_null($shopAccount)) {
                echo 'ShopAccount_' .$values['shopAccountIndex'] ." not found.";
                exit;
            }
            if (is_null($business)) {
                echo 'Business_' .$values['businessIndex'] ." not found.";
                exit;
            }
            if (is_null($prefecture)) {
                echo 'Prefecture_' .$values['prefectureId'] ." not found.";
                exit;
            }

            $shop = new Shop();
            $shop
                ->setUpdated($now)
                ->setCreated($now)
                ->setShopAccount($shopAccount)
                ->setBusiness($business)
                ->setCompanyName($values['companyName'])
                ->setPrefecture($prefecture)
                ->setMunicipalityCd($values['MunicipalityCd'])
                ->setAddress($values['address'])
                ->setBuildingName($values['buildingName'])
                ->setMail($values['mail'])
                ->setTel($values['tel'])
            ;

            $manager->persist($shop);
            $this->setReference('Shop_'. $index, $shop);
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getModelFile()
    {
        return 'shop';
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 50;
    }

}
