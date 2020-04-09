<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Tag")
 * @ORM\Table(name="tag")
 */
class Tag extends \Cajudev\RestfulApi\Entity
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