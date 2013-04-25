<?php
// src/Lv/PlatformBundle/Validator/Constraints/ContainsAlphanumericValidator.php
namespace Lv\PlatformBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ContainsAlphanumericValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!preg_match('/^[a-zA-Za0-9]+$/', $value, $matches)) {
            $this->context->addViolation($constraint->message, array('%string%' => $value));
        }
    }

    /**
     * {@inheritDoc}
     */
    public function validatedBy()
    {
        return 'ContainsAlphanumericValidator';
    }
}
