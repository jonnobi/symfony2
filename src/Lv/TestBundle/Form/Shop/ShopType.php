<?php

namespace Lv\TestBundle\Form\Shop;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ShopType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('shop_id', 'hidden')
            ->add('shopAccount')
            ->add('business')
            ->add('company_name')
            ->add('prefecture')
            ->add('address')
            ->add('building_name')
            ->add('municipality_cd')
            ->add('mail')
            ->add('tel')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lv\TestBundle\Entity\Shop'
        ));
    }

    public function getName()
    {
        return 'lv_testbundle_shoptype';
    }
}
