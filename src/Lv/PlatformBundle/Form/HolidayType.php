<?php

namespace Lv\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HolidayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('holiday', 'date',
                    array(
                        'label' => '年月日',
                        'required' => true,
                    )
            )
            ->add('week', 'choice', array(
                        'choices' => array(
                            0 => '日',
                            1 => '月',
                            2 => '火',
                            3 => '水',
                            4 => '木',
                            5 => '金',
                            6 => '土',
                        ),
                        'empty_value' => '選択してください',
                        'label' => '曜日',
                    )
            )
            ->add('htype', 'choice', array(
                        'choices' => array(
                            0 => '祝日等ではない',
                            1 => '祝日',
                            2 => '振替休日',
                            3 => '国民の休日',
                            9 => 'その他休日(いわゆる御用納期間)',
                        ),
                        'empty_value' => '選択してください',
                        'label' => '祝日タイプ',
                    )
            )
            ->add('hname', 'text',
                    array(
                        'label' => '祝日名（元旦など）'
                    )
            )
//            ->add('updated')
//            ->add('created')
//            ->add('deleted')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lv\PlatformBundle\Entity\Holiday'
        ));
    }

    public function getName()
    {
        return 'lv_platformbundle_holidaytype';
    }
}
