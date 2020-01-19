<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Customer")
 * @ORM\Table(name="customer")
 */
class Customer extends \Cajudev\RestfulApi\Entity
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    private $id = null;

    /** @ORM\Column(type="string") **/
    private $name = null;

    /** @OneToMany(targetEntity="Address", mappedBy="customer", cascade={"persist"}, orphanRemoval=true) */
    private $addresses = null;

    public function __construct(array $params)
    {
        $this->addresses = new ArrayCollection();
        parent::__construct($params);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(int $index)
    {
        return $this->addresses->get($index);
    }
    
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(Address $address)
    {
        return $this->addresses->add($address->setCustomer($this));
    }

    public function setAddresses(Collection $addresses): self
    {
        $this->addresses->clear();

        foreach ($addresses as $address) {
            $this->addAddress($address);
        }

        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'addresses' => $this->getAddresses()->map(function ($address) {
                return $address->toArray();
            })->toArray(),
        ];
    }
}
