<?php

namespace App\Validator;

use Cajudev\RestfulApi\Validator;
use Cajudev\RestfulApi\Annotation\Validation;
use Cajudev\RestfulApi\Exception\BadRequestException;

class Category extends \Cajudev\RestfulApi\Validator
{
    /** @Validation(type="string") */
    public $property;

    public function validateProperty()
    {
        throw new BadRequestException('Bad Request');
    }
}