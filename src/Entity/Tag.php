<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Cajudev\Rest\Annotation\Payload;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Tag")
 */
class Tag extends \Cajudev\Rest\Entity
{
    /**
     * @Payload
     * 
     * @ORM\Column(type="string")
     */
    private string $description;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="tags")
     * @ORM\JoinColumn(nullable=false)
     */
    private Product $product;
}
