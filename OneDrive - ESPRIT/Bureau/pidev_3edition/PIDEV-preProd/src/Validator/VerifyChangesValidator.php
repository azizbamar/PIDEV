<?php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class VerifyChangesValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {

        $originalValues = $value->getOriginalValues();


        $currentValues = [
            'location' => $value->getLocation(),
            'amountSinister' => $value->getamountLocation(),
            'statusSinister' => $value->getstatusSinister(),
            'description' => $value->getdescription(),
            'beneficiaryName' => $value->getbeneficiaryName(),
        ];

        if ($originalValues == $currentValues) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}