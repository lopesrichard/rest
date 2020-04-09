<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Category")
 */
class Category extends \Cajudev\RestfulApi\Entity
{
    /** @ORM\Column(type="string", nullable=false) **/
    private string $description;

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
        ];
    }
}
