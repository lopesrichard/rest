<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Cajudev\Rest\Annotations\Payload;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Color")
 */
class Color extends \Cajudev\Rest\Entity
{
    /**
     * @Payload(context={"default", "options"})
     * 
     * @ORM\Column(type="string", nullable=false)
     */
    private string $description;
}
