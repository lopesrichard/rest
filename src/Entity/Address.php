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

    /** @ORM\Column(type="boolean") **/
    private $active = true;

    /** @ORM\Column(type="boolean") **/
    private $excluded = false;
        
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'postcode' => $this->postcode,
        ];
    }
}
