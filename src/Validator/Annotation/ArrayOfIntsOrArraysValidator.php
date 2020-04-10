<?php

namespace App\Validator\Annotation;

use Cajudev\Rest\Exception\BadRequestException;

class ArrayOfIntsOrArraysValidator
{
    public function validate(string $property, $array)
    {
        if (!is_array($array)) {
            throw new BadRequestException("Parâmetro [$property] informado é inválido.");
        }

        foreach ($array as $key => $value) {
            if (!is_int($value) && !is_array($value)) {
                throw new BadRequestException("Parâmetro [$property] contém valores inválidos.");
            }
        }

        return $array;
    }
}
