<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Address")
 * @ORM\Table(name="address")
 */
class Address extends \Cajudev\RestfulApi\Entity
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    private $id = null;

    /** @ORM\Column(type="string") **/
    private $postcode;

    /**
     * @ManyToOne(targetEntity="Customer", inversedBy="addresses")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $customer;

    public function getId(): int
    {
        return $this->id;
    }

    public function getPostcode(): string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'postcode' => $this->getPostcode(),
        ];
    }
}
