<?php

namespace Lv\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\CallbackValidator;
use Symfony\Component\Form\FormError;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'お名前'))
            ->add('name_eng', 'text', array('label' => 'お名前（ローマ字）'))
            ->add('address', 'text', array('label' => '住所'))
            ->add('tel', 'number', array('label' => '電話番号'))
            ->add('gender', 'choice', array(
                'choices' => array(1 => '男性', '2' => '女性'),
                'empty_value' => '- 選択して下さい -')
                )
            ->add('email', 'email', array('label' => 'Eメール'))
            ->add('emailConfirm', 'email', array(
                'property_path' => false,
                'required' => true,
                'label' => 'Eメール（確認）',
                ))

//property_pathオプションにfalseもしくは空文字を指定すると、どのプロパティにもマッピングされなくなります。
            ->add('agreement', 'checkbox', array(
                'property_path' => false,
                'required' => true,
                'label' => '利用規約に同意する',
                ))
        ;

//        $buider
//            ->addValidator(new CallbackValidator(function($form) {
//                if ($form['email']->getData() && $form['email']->getData() != $form['emailConfirm']->getData()) {
//                    $form['email']->addError(
//                            new FormError('Eメール確認と異なります.'));
//                }
//            }))
//            ->addValidator(new CallbackValidator(function($form) {
//                if (!$form['agreement']->getData()) {
//                    $form['agreement']->addError(
//                            new FormError('利用規約に同意してください.'));
//                }
//            }))
//        ;

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lv\TestBundle\Entity\Member'
        ));
    }

    public function getName()
    {
        return 'lv_testbundle_membertype';
    }
}
