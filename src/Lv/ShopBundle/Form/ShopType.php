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
            'data_class' => 'Lv\ShopBundle\Entity\Shop'
        ));
    }

    public function getName()
    {
        return 'lv_shopbundle_shoptype';
    }
}
