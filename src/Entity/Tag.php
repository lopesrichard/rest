<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

use Cajudev\Rest\Annotations\Payload;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Tag")
 */
class Tag extends \Cajudev\Rest\Entity
{
    /**
     * @Payload(context={"default", "options"})
     * 
     * @ORM\Column(type="string")
     */
    private string $description;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="tags")
     * @ORM\JoinColumn(nullable=false)
     */
    private Product $product;

    /**
     * @Payload(context={"default"}, property="description")
     * 
     * @ORM\ManyToOne(targetEntity="Color", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private Color $color;
}
