<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lv\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Lv\PlatformBundle\DataFixtures\ORM\LoadFixtureData;
use Lv\PlatformBundle\Entity\Prefecture;
use Lv\PlatformBundle\Entity\Municipality;


/**
 * Description of LoadMunicipalityData
 */
class LoadMunicipalityData extends LoadFixtureData implements OrderedFixtureInterface, FixtureInterface
{
    /**
     * @var Array シーケンス定義
     * 当ローダークラスで初期化するシーケンスを定義してください.
     */
    private static $tableSequenses = array(
        'municipality' => 'municipality_id',
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

        foreach ($modelFixtures['Municipality'] AS $index => $values)
        {
            $municipalityCd = $values['municipalityCd'];
            $municipality = new Municipality();
            $municipality
                ->setUpdated($now)
                ->setCreated($now)
                ->setMunicipalityCd($values['municipalityCd'])
                ->setPrefectureId($values['prefectureId'])
                ->setMunicipalityName($values['municipalityName'])
            ;
            $manager->persist($municipality);
            $this->setReference('Municipality_'. (string)$municipalityCd, $municipality);
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getModelFile()
    {
        return 'municipality';
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 30;
    }

}
