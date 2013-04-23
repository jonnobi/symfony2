<?php
/**
 * Created by JetBrains PhpStorm.
 * User: azumi
 * Date: 13/03/26
 * Time: 20:25
 * To change this template use File | Settings | File Templates.
 * 元ネタは
 * http://www.strangebuzz.com/post/2012/01/28/Load-fixtures-with-Symfony2
 * です。
 */

namespace Lv\ShopaccountBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Yaml\Yaml;

abstract class LoadFixtureData extends AbstractFixture implements ContainerAwareInterface
{
  /**
   * Return the file for the current model.
   */
  abstract function getModelFile();

  /**
   * @var Symfony\Component\DependencyInjection\ContainerInterface
   */
  private $container;

  /**
   * Make the sc available to our loader.
   *
   * @param ContainerInterface $container
   */
  public function setContainer(ContainerInterface $container = null)
  {
    $this->container = $container;
  }

  /**
   * Return the fixtures for the current model.
   *
   * @return Array
   */
  public function getModelFixtures()
  {
    $fixturesPath = realpath(dirname(__FILE__). '/../fixtures');
    $fixtures     = Yaml::parse(file_get_contents($fixturesPath. '/'. $this->getModelFile(). '.yml'));

    return $fixtures;
  }

  /**
   * Initialize db sequences.
   *
   * @param ObjectManager  $manager
   * @param Array $tableSequenses  Array of key=table, value=column.
   */
  public function initializeDbSequence($manager, $tableSequenses)
  {
    foreach ($tableSequenses AS $tableName => $sequenceName) {
      $query = sprintf(
        "SELECT SETVAL((SELECT pg_get_serial_sequence('%s', '%s')), 1, false);",
        $tableName,
        $sequenceName
      );
      $result = $manager->createNativeQuery(
        $query,
        new ResultSetMapping()
      )
      ->getResult();
    }
  }

}