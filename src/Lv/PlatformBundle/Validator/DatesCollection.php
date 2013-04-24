<?php

namespace Lv\PlatformBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * Description of DateCollection
 *
 * @author co-yamada
 */
class DateCollection extends Constraint
{
    public $emptyMessage = '入力は必須です';
    public $message = '日付でないものが含まれています';
}

