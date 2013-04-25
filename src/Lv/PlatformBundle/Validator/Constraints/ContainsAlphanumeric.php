<?php
// src/Lv/PlatformBundle/Validator/Constraints/ContainsAlphanumeric.php
namespace Lv\PlatformBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsAlphanumeric extends Constraint
{
    public $message = 'The string "%string%" contains an illegal character: it can only contain letters or numbers.';

}
