<?php

namespace App\Validator;

use Cajudev\Rest\Validator;
use Cajudev\Rest\Annotations\Validations;
use Cajudev\Rest\Exceptions\BadRequestException;

class Tag extends \Cajudev\Rest\Validator
{
    /**
     * @Validations\Strings(maxlength=255, required=true)
     */
    public $description;

    /**
     * @Validations\Strings(maxlength=255)
     */
    public $color = 'default';

    public function validateColor()
    {
        $repository = $this->em->getRepository(\App\Entity\Color::class);

        if ($color = $repository->findOneByDescription($this->color)) {
            return $this->color = $color;
        }

        $validator = new \App\Validator\Color(['description' => $this->color]);
        $validator->validate(Validator::INSERT);

        $this->color = new \App\Entity\Color($validator->payload());
    }
}