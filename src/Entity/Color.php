<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Cajudev\Rest\Annotation\Payload;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Color")
 */
class Color extends \Cajudev\Rest\Entity
{
    /**
     * @Payload
     * 
     * @ORM\Column(type="string", nullable=false)
     */
    private string $description;
}
