<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Cajudev\Rest\Annotations\Payload;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Category")
 */
class Category extends \Cajudev\Rest\Entity
{
    /**
     * @Payload(context={"default", "options"})
     * 
     * @ORM\Column(type="string", nullable=false)
     */
    private string $description;

    /**
     * @Payload(context={"default"}, properties={"description", "parent"})
     * 
     * @ORM\ManyToOne(targetEntity="Category", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private ?Category $parent;
}
