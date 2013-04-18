<?php

namespace Lv\ShopBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;


/**
 * ShopRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ShopRepository extends EntityRepository
{
    /** @var integer 店舗検索時の該当件数 */
    public $shop_total_count = 0;

    /**
     * getList
     *
     * @param integer $shop_account_id
     * @param integer $limit
     * @param integer $offset
     * @return \Doctrine\ORM\Tools\Pagination\Paginator
     */
    public function getList($shop_account_id = null, $limit = null, $offset = null)
    {
        $qb = $this->getEntityManager()->createQueryBuilder()
                ->select('s, p, b')
                ->from('LvShopBundle:Shop', 's')
                ->leftJoin('s.prefecture', 'p' )
                ->leftJoin('s.business', 'b')
//                ->leftJoin('s.shopExtensionData', 'sed')
                ->where('s.deleted is null')
                ->andWhere('p.deleted is null')
                ->andWhere('b.deleted is null')
//                ->andWhere('sed.deleted is null')
                ->orderBy('s.shopId', 'ASC');

        if ($limit) {
            $qb->setMaxResults($limit);
        }
        if ($offset) {
            $qb->setFirstResult($offset);
        }
        if ($shop_account_id) {
            $qb->andWhere('s.shopAccountId = :shop_account_id')
                ->setParameter('shop_account_id', $shop_account_id);
        }

        $query = $qb->getQuery();
        $paginator = new Paginator($query, $fetchJoinCollection = false);
        $this->shop_total_count = count($paginator);

        return $paginator;
    }


    /**
     * 店舗検索時の該当件数を返す
     *
     * @return integer ::$shop_total_count
     */
    public function getShopTotalCount()
    {
        return $this->shop_total_count;
    }

    /**
     * 店舗詳細取得
     *
     * @param integer $id shop_id
     * @return mixed
     */
    public function getShopDetail($id)
    {
        $query = $this->getEntityManager()->createQueryBuilder()
                ->select('s, p, b')
                ->from('LvShopBundle:Shop', 's')
                ->leftJoin('s.prefecture', 'p')
                ->leftJoin('s.business', 'b')
                //->leftJoin('s.shopExtensionData', 'ext')
                //->leftJoin('s.shopCreditCards', 'cards')
                ->where('s.shopId = :id')
                ->setParameter('id', $id)
                ->setMaxResults(1)
                ->getQuery();

        try {
            $shop = $query->getSingleResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
            $shop = null;

            $logger = $this->get('logger');
            $logger->err($e->getMessage());
        }

        return $shop;
  }

}