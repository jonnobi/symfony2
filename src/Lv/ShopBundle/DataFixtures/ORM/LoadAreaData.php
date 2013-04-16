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
use Lv\ShopBundle\Entity\Area;


/**
 * Description of LoadAreaData
 */
class LoadAreaData extends LoadFixtureData implements OrderedFixtureInterface, FixtureInterface
{
    /**
     * @var Array シーケンス定義
     * 当ローダークラスで初期化するシーケンスを定義してください.
     */
    private static $tableSequenses = array(
        'area' => 'area_id',
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

        foreach ($modelFixtures['Area'] AS $index => $values)
        {
            $area = new Area();
            $area
                ->setUpdated($now)
                ->setCreated($now)
                ->setAreaName($values['areaName'])
            ;
            $manager->persist($area);
            $this->setReference('Area_'. $index, $area);
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getModelFile()
    {
        return 'area';
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 10;
    }

}
