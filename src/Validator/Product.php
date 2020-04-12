<?php

namespace App\Validator;

use Doctrine\Common\Collections\ArrayCollection;

use Cajudev\Rest\Validator;
use Cajudev\Rest\Annotations\Validations;
use Cajudev\Rest\Exceptions\BadRequestException;

class Product extends \Cajudev\Rest\Validator
{
    /**
     * @Validations\Strings(maxlength=255, required=true)
     */
    public $name;

    /**
     * @Validations\Strings(maxlength=255, required=true)
     */
    public $description;

    /**
     * @Validations\DateTime(format="ISO8601")
     */
    public $expiration;

    /**
     * @Validations\Entity(owner="product", target="category", field="description", exclusive=false, required=true)
     */
    public $category;

    /**
     * @Validations\Collection(owner="product", target="tag", field="description", exclusive=true, required=true)
     */
    public $tags;

    /**
     * @Validations\Collection(owner="product", target="color", field="description", exclusive=false, required=true)
     */
    public $colors;
}
