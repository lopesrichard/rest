<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

use Cajudev\Rest\Annotations\Query;
use Cajudev\Rest\Annotations\Payload;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Product")
 */
class Product extends \Cajudev\Rest\Entity
{
    /**
     * @Payload
     * 
     * @Query(sortable=true, searchable=true)
     * 
     * @ORM\Column(type="string", nullable=false)
     */
    private string $name;

    /**
     * @Payload
     * 
     * @Query(sortable=true, searchable=true)
     * 
     * @ORM\Column(type="string", nullable=false)
     */
    private string $description;

    /**
     * @Payload(properties={"description", "parent"})
     * 
     * @ORM\ManyToOne(targetEntity="Category", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private Category $category;

    /**
     * @Payload(properties={"description", "color": {"description"}})
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
