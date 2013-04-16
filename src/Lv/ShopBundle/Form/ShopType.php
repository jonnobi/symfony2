<?php

namespace Lv\ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ShopType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('shop_id', 'hidden')
            ->add('shopAccount')
            ->add('shop_account_id', 'hidden')
            ->add('business_id', 'hidden')
            ->add('business')
            ->add('company_name')
            ->add('prefecture_id', 'hidden')
            ->add('prefecture')
            ->add('municipality_cd')
            ->add('address')
            ->add('building_name')
            ->add('mail')
            ->add('tel')
//            ->add('created', 'hidden')
//            ->add('updated', 'hidden')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lv\ShopBundle\Entity\Shop'
        ));
    }

    public function getName()
    {
        return 'lv_shopbundle_shoptype';
    }
}
