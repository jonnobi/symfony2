<?php

namespace Lv\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MunicipalityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('municipalityCd')
            ->add('prefectureId')
            ->add('municipalityName')
            ->add('updated')
            ->add('created')
            ->add('deleted')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lv\PlatformBundle\Entity\Municipality'
        ));
    }

    public function getName()
    {
        return 'lv_platformbundle_municipalitytype';
    }
}
