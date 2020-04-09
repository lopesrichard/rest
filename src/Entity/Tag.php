<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Tag")
 */
class Tag extends \Cajudev\RestfulApi\Entity
{
    /** @ORM\Column(type="string") **/
    private string $description;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="tags")
     * @ORM\JoinColumn(nullable=false)
     */
    private Product $product;

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
        ];
    }
}
