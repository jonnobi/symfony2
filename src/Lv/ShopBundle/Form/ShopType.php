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
            ->add('shopId', 'hidden')
            ->add('shopAccount')
//            ->add('shopAccount', 'entity',
//                    array(
//                        'class' => 'Lv\ShopBundle\Entity\ShopAccount',
//                        'expanded' => false,
//                        'multiple' => false,
//                        'query_builder'=>function(EntityRepository $repository){
//                            return $repository->createQueryBuilder('sa')
//                                ->select('sa')
//                                ->where('sa.deleted IS NULL')
//                                ->orderBy('sa.shopAccountId', 'ASC');
//                        },
//                        'property' => 'shopAccountName',
//                        'label' => '本部'
//                    )
//                )
            ->add('business')
            ->add('companyName')
            ->add('prefecture')
            ->add('address')
            ->add('buildingName')
            ->add('municipalityCd')
            ->add('mail')
            ->add('tel')
            ->add('capacity')
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
