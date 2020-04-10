<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

use Cajudev\RestfulApi\Annotation\Payload;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Product")
 */
class Product extends \Cajudev\RestfulApi\Entity
{
    /**
     * @Payload
     * 
     * @ORM\Column(type="string", nullable=false)
     */
    private string $name;

    /**
     * @Payload
     * 
     * @ORM\Column(type="string", nullable=false)
     */
    private string $description;

    /**
     * @Payload(property="description")
     * 
     * @ORM\ManyToOne(targetEntity="Category", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private Category $category;

    /**
     * @Payload(property="description")
     * 
     * @ORM\OneToMany(targetEntity="Tag", mappedBy="product", cascade={"persist"}, orphanRemoval=true)
     */
    private Collection $tags;

    /**
     * @Payload(property="description")
     * 
     * @ORM\ManyToMany(targetEntity="Color", cascade={"persist"})
     */
    private Collection $colors;
}
