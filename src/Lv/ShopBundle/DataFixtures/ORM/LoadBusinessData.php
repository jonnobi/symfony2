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
use Lv\ShopBundle\Entity\Business;


/**
 * Description of LoadBusinessData
 */
class LoadBusinessData extends LoadFixtureData implements OrderedFixtureInterface, FixtureInterface
{
    /**
     * @var Array シーケンス定義
     * 当ローダークラスで初期化するシーケンスを定義してください.
     */
    private static $tableSequenses = array(
        'business' => 'business_id',
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

        foreach ($modelFixtures['Business'] AS $index => $values)
        {
            $business = new Business();
            $business
                ->setUpdated($now)
                ->setCreated($now)
                ->setBusinessName($values['businessName'])
                ->setSortNo($values['sortNo'])
            ;
            $manager->persist($business);
            $this->setReference('Business_'. $index, $business);
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getModelFile()
    {
        return 'business';
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 10;
    }

}
