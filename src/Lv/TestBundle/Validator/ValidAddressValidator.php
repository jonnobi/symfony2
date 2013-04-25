<?php
// src/Lv/TestBundle/Validator/AddressValidator.php
namespace Lv\TestBundle\Validator;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class ValidAddressValidator extends ConstraintValidator
{

    /**
     * @var entityManager
     */
    private $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * 都道府県名存在チェック
     * @param string     $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        $prefectureName = null;
        if (1 == preg_match("/^.+(都|道|県|府)/", $value, $matches)) {
            $prefectureName = $matches[0];
        }

        $prefectureObj = array();
        if (null != $prefectureName) {
            $query = $this->entityManager->createQueryBuilder()
                ->select('p')
                ->from('LvPlatformBundle:Prefecture', 'p')
                ->where('p.prefectureName = :name')
                ->andWhere('p.deleted is null')
                ->setParameter('name', $prefectureName)
                ->getQuery();

            $prefectureObj = $query->getResult();
        }

        // 都道府県マスタに無い、名称だった場合
        if ($prefectureName != null && 0 == count($prefectureObj)) {
            $this->context->addViolation($constraint->message, array());
//            $this->context->addViolation($constraint->message, array('%string%' => $value));
        }
    }
}
