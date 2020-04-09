<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Product")
 * @ORM\Table(name="product")
 */
class Product extends \Cajudev\RestfulApi\Entity
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    private ?int $id;

    /** @OneToMany(targetEntity="Address", mappedBy="customer", cascade={"persist"}, orphanRemoval=true) */
    private Collection $addresses;

    public function toArray(): array
    {
        return [
            'id' => $this->id,
        ];
    }
}
