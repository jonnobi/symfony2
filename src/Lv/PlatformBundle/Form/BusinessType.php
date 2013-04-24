<?php

namespace Lv\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BusinessType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('businessName')
            ->add('sortNo')
            ->add('updated')
            ->add('created')
            ->add('deleted')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lv\PlatformBundle\Entity\Business'
        ));
    }

    public function getName()
    {
        return 'lv_platformbundle_businesstype';
    }
}
