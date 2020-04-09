<?php

namespace App\Validator;

use Cajudev\RestfulApi\Validator;
use Cajudev\RestfulApi\Annotation\Validation;
use Cajudev\RestfulApi\Exception\BadRequestException;

class Product extends \Cajudev\RestfulApi\Validator
{
    /** @Validation(type="string", params={ "maxlength": 30 }) */
    public $name;

    public function validateName()
    {
        throw new BadRequestException('Bad Request');
    }
}
