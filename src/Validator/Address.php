<?php

namespace App\Validator;

use Cajudev\RestfulApi\Annotation\Validation;

class Address extends \Cajudev\RestfulApi\Validator
{
    /** @Validation(type="string", params={ "length":8 }) */
    public $postcode;
}
