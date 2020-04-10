<?php

namespace App\Validator;

use Cajudev\Rest\Validator;
use Cajudev\Rest\Annotations\Validation;
use Cajudev\Rest\Exceptions\BadRequestException;

class Category extends \Cajudev\Rest\Validator
{
    /** @Validation(type="string") */
    public $property;

    public function validateProperty()
    {
        throw new BadRequestException('Bad Request');
    }
}