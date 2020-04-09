<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Category")
 * @ORM\Table(name="category")
 */
class Category extends \Cajudev\RestfulApi\Entity
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    private $id = null;

    public function toArray(): array
    {
        return [
            'id' => $this->id,
        ];
    }
}