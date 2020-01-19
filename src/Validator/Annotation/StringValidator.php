<?php

namespace App\Validator\Annotation;

use Cajudev\RestfulApi\Exception\BadRequestException;

class StringValidator
{
    private $length;
    private $maxlength;

    public function __construct($params)
    {
        $this->length    = $params['length'] ?? null;
        $this->maxlength = $params['maxlength'] ?? null;
    }

    public function validate(string $property, $string)
    {
        if (!is_string($string)) {
            throw new BadRequestException("Parâmetro [$property] informado é inválido.");
        }

        if ($this->length !== null && strlen($string) !== $this->length) {
            throw new BadRequestException("Parâmetro [$property] deve possuir exatamente [$this->length] caracteres.");
        }

        if ($this->maxlength !== null && strlen($string) > $this->maxlength) {
            throw new BadRequestException("Parâmetro [$property] ultrapassa o limite máximo de {$this->maxlength} caracteres.");
        }

        return $string;
    }
}
