<?php

namespace App\Validator;

use Cajudev\RestfulApi\Validator;
use Doctrine\Common\Collections\ArrayCollection;
use Cajudev\RestfulApi\Annotation\Validation;
use Cajudev\RestfulApi\Exception\NotFoundException;
use Cajudev\RestfulApi\Exception\BadRequestException;
use Cajudev\RestfulApi\Exception\UnprocessableEntityException;

class Customer extends \Cajudev\RestfulApi\Validator
{
    /** @Validation(type="string", params={ "maxlength":10 }) */
    public $name;

    /** @Validation(type="arrayOfIntsOrArrays", params={ "maxlength":10 }) */
    public $addresses;

    public function validateAddresses()
    {
        $addresses = new ArrayCollection();

        foreach ($this->addresses as $address) {
            $addresses->add($this->validateAddress($address));
        }

        $this->addresses = $addresses;
    }

    public function validateAddress($address)
    {
        if (is_numeric($address)) {
            if (!($entity = $this->getRepository('Address')->find($address))) {
                throw new NotFoundException("Endereço de id [{$address}] não encontrado");
            }
            return $entity;
        }

        $address = $this->getValidator('Address', $address);
        $address->validateInsert();

        return $this->getEntity('Address', $address->getData());
    }
}
