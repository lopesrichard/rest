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
     * @ORM\ManyToOne(targetEntity="Category", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private Category $category;

    /** @ORM\OneToMany(targetEntity="Tag", mappedBy="product", cascade={"persist"}, orphanRemoval=true) */
    private Collection $tags;

    /** @ORM\ManyToMany(targetEntity="Color", cascade={"persist"}) */
    private Collection $colors;

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category->description,
            'tags' => $this->tags->map(fn ($tag) => $tag->description)->toArray(),
            'colors' => $this->colors->map(fn ($color) => $color->description)->toArray(),
        ];
    }
}
