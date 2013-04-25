<?php

namespace Lv\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * Description of GenderType
 *
 * @author co-yamada
 */
class GenderType extends AbstractType
{
    public function getDefaultOptions(array $options)
    {
        return array(
            'choices' => array(
                1 => '男性',
                2 => '女性',
            )
        );
    }

    public function getParent(array $options)
    {
        return 'choice';
    }

    public function getName()
    {
        return 'gender';
    }
}
