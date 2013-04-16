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
use Lv\ShopBundle\Entity\Prefecture;


/**
 * Description of LoadPrefectureData
 */
class LoadPrefectureData extends LoadFixtureData implements OrderedFixtureInterface, FixtureInterface
{
    /**
     * @var Array シーケンス定義
     * 当ローダークラスで初期化するシーケンスを定義してください.
     */
    private static $tableSequenses = array(
        'prefecture' => 'prefecture_id',
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

        foreach ($modelFixtures['Prefecture'] AS $index => $values)
        {
            $area = $this->getReference('Area_' .(string)$values['areaIndex']);

            $pref = new Prefecture();
            $pref
                ->setUpdated($now)
                ->setCreated($now)
                ->setPrefectureName($values['name'])
                ->setArea($area)
                ->setAreaSort($values['areaSort'])
            ;
            $manager->persist($pref);
            $this->setReference('Prefecture_'. $index, $pref);
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getModelFile()
    {
        return 'prefecture';
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 20;
    }

}
