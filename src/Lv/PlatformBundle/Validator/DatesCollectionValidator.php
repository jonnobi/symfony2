<?php

namespace Lv\PlatformBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * Description of DatesCollectionValidator
 *
 * @author co-yamada
 */
class DatesCollectionValidator extends ConstraintValidator
{
    /**
     * {@inheritDoc}
     */
    public function isValid($value, Constraint $constraint)
    {
        $dates = array_filter(array_map('trim', explode("\n", $value)));

        if (count($dates) < 1) {
            $this->setMessage($constraint->emptyMessage);

            return false;
        }

        $dateConstraint = new Date(array('message' => $constraint->message));
        $dateValidator = new DateValidator($this->context);

        foreach ($dates as $date) {
            if (false === $dateValidator->isValid(str_replace('/', '-', $date), $dateConstraint)) {
                $this->setMessage($dateValidator->getMessageTemplate(), $dateValidator->getMessageParameters());

                return false;
            }
        }

        return true;
    }
}
