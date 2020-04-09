<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Product")
 */
class Product extends \Cajudev\RestfulApi\Entity
{
    /** @ORM\Column(type="string", nullable=false) **/
    private string $name;

    /** @ORM\Column(type="string", nullable=false) **/
    private string $description;

    /**
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(nullable=false)
     */
    private Category $category;

    /** @ORM\OneToMany(targetEntity="Tag", mappedBy="product", cascade={"persist"}, orphanRemoval=true) */
    private Collection $tags;

    /** @ORM\ManyToMany(targetEntity="Color") */
    private Collection $colors;

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category->toArray(),
            'tags' => $this->tags->map(fn ($tag) => $tag->toArray())->toArray(),
            'colors' => $this->colors->map(fn ($color) => $color->toArray())->toArray(),
        ];
    }
}
