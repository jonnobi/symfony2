<?php
// src/Lv/TestBundle/Validator/ValidAddress.php
namespace Lv\TestBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ValidAddress extends Constraint
{
    public $message = '都道府県名から正しく入力してください。';
    public $entity;
    public $property;

    /**
     * {@inheritDoc}
     */
    public function validatedBy()
    {
        return 'lv_test_address_validator';
    }

//    public function requiredOptions()
//    {
//        return array('entity', 'property');
//    }

    public function targets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
