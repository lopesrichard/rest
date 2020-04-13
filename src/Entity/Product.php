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
     * @Payload(context={"default", "options"})
     * 
     * @Query(sortable=true, searchable=true)
     * 
     * @ORM\Column(type="string", nullable=false)
     */
    private string $name;

    /**
     * @Payload(context={"default"})
     * 
     * @Query(sortable=true, searchable=true)
     * 
     * @ORM\Column(type="string", nullable=false)
     */
    private string $description;

    /**
     * @Payload(context={"default"}, format="ISO8601")
     * 
     * @ORM\Column(type="datetime", nullable=false)
     */
    private \DateTime $expiration;

    /**
     * @Payload(context={"default"}, properties={"description", "parent"})
     * 
     * @ORM\ManyToOne(targetEntity="Category", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private Category $category;

    /**
     * @Payload(context={"default"}, properties={"description", "color": {"description"}})
     * 
     * @ORM\OneToMany(targetEntity="Tag", mappedBy="product", cascade={"persist"}, orphanRemoval=true)
     */
    private Collection $tags;

    /**
     * @Payload(context={"default"}, property="description")
     * 
     * @ORM\ManyToMany(targetEntity="Color", cascade={"persist"})
     */
    private Collection $colors;
}
