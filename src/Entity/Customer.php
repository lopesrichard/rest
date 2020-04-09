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

    /** @ORM\Column(type="boolean") **/
    private $active = true;

    /** @ORM\Column(type="boolean") **/
    private $excluded = false;

    public function __construct(array $params)
    {
        $this->addresses = new ArrayCollection();
        parent::__construct($params);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'addresses' => $this->addresses->map(fn ($address) => $address->toArray())->toArray(),
        ];
    }
}
