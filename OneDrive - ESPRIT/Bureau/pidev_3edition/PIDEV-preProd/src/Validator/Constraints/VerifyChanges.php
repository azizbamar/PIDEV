<?php
namespace App\Validator\Constraints;


use Symfony\Component\Validator\Constraint;

/**
* @Annotation
*/
class VerifyChanges extends Constraint
{
public $message = 'No changes have been made to the entity.';
}