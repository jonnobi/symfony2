<?php

namespace Lv\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrefectureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prefectureName')
            ->add('areaId')
            ->add('areaSort')
            ->add('updated')
            ->add('created')
            ->add('deleted')
            ->add('area')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lv\PlatformBundle\Entity\Prefecture'
        ));
    }

    public function getName()
    {
        return 'lv_platformbundle_prefecturetype';
    }
}
