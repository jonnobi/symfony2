<?php

namespace Lv\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('tel')
            ->add('email')
            ->add('updated')
            ->add('created')
            ->add('deleted')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lv\TestBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'lv_testbundle_usertype';
    }
}
