<?php

namespace App\Validator;

use Cajudev\Rest\Validator;
use Cajudev\Rest\Annotations\Validations;
use Cajudev\Rest\Exceptions\Http\BadRequestException;

class Color extends \Cajudev\Rest\Validator
{
    /**
     * @Validations\Strings(maxlength=255, required=true)
     */
    public $description;
}