<?php

namespace App\Validator;

use Cajudev\Rest\Validator;
use Cajudev\Rest\Annotations\Validations;
use Cajudev\Rest\Factories\RepositoryFactory;
use Cajudev\Rest\Exceptions\BadRequestException;

class Tag extends \Cajudev\Rest\Validator
{
    /**
     * @Validations\Strings(maxlength=255, required=true)
     */
    public $description;

    /**
     * @Validations\Entity(owner="tag", target="color", field="description", exclusive=false, required=false)
     */
    public $color = 'default';
}