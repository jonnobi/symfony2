<?php

namespace Lv\ShopBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ShopType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'hidden')
            ->add('companyName', 'text', array( 'label' => '店舗名' ))
            ->add('address', 'text', array( 'label' => '住所（市区町村郡以降）' ))
            ->add('buildingName', 'text', array( 'label' => 'ビル名' ))
            ->add('mail', 'text', array( 'label' => 'メールアドレス' ))
            ->add('tel', 'text', array( 'label' => '電話番号' ))
            ->add('capacity', 'text', array( 'label' => '客席数' ))

            ->add('shopAccount', 'entity',
                    array(
                        'class' => 'LvShopaccountBundle:ShopAccount',
                        'expanded' => false,
                        'multiple' => false,
                        'query_builder'=>function(EntityRepository $repository){
                            return $repository->createQueryBuilder('sa')
                                ->select('sa')
                                ->where('sa.deleted IS NULL')
                                ->orderBy('sa.id', 'ASC');
                        },
                        'property' => 'shopAccountName',
                        'empty_value' => '選択してください',
                        'label' => '法人本部アカウント'
                    )
                )

            ->add('business', 'entity',
                    array(
                        'class' => 'LvPlatformBundle:business',
                        'expanded' => false,
                        'multiple' => false,
                        'query_builder'=>function(EntityRepository $repository){
                            return $repository->createQueryBuilder('b')
                                ->select('b')
                                ->where('b.deleted IS NULL')
                                ->orderBy('b.id', 'ASC');
                        },
                        'property' => 'businessName',
                        'empty_value' => '選択してください',
                        'label' => '業種'
                    )
                )

            ->add('prefecture', 'entity',
                    array(
                        'class' => 'LvPlatformBundle:prefecture',
                        'expanded' => false,
                        'multiple' => false,
                        'query_builder'=>function(EntityRepository $repository){
                            return $repository->createQueryBuilder('p')
                                ->select('p')
                                ->where('p.deleted IS NULL')
                                ->orderBy('p.id', 'ASC');
                        },
                        'property' => 'prefectureName',
                        'empty_value' => '選択してください',
                        'label' => '都道府県'
                    )
                )
            ->add('municipalityCd', 'entity',
                    array(
                        'class' => 'LvPlatformBundle:municipality',
                        'expanded' => false,
                        'multiple' => false,
                        'query_builder'=>function(EntityRepository $repository){
                            return $repository->createQueryBuilder('m')
                                ->select('m')
                                ->where('m.deleted IS NULL')
                                ->orderBy('m.id', 'ASC');
                        },
                        'property' => 'municipalityName',
                        'empty_value' => '選択してください',
                        'label' => '市区町村郡コード'
                    )
                )
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
