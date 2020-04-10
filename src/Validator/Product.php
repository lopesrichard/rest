<?php

namespace App\Validator;

use Cajudev\Rest\Validator;
use Cajudev\Rest\Exceptions\BadRequestException;

class Product extends \Cajudev\Rest\Validator
{
    // /** @Validation\String */
    public $name;

    // /** @Validation\String */
    public $description;

    // /**
    //  * @Validation\Any<Integer, String, Object>
    //  */
    public $category;

    // /**
    //  * @Validation\Array<Integer, String, Object>)
    //  */
    public $tags;

    // /**
    //  * @Validation\Array<Integer, String, Object>)
    //  */
    public $colors;

    public function validateCategory()
    {
        $repository = $this->em->getRepository(\App\Entity\Category::class);

        if (is_int($this->category)) {
            if (!($category = $repository->find($this->category))) {
                throw new BadRequestException("Categoria [{$this->category}] não encontrada");
            }
            return $this->category = $category;
        }

        if (is_string($this->category)) {
            if ($category = $repository->findOneByDescription($this->category)) {
                return $this->category = $category;
            }
            return $this->category = new \App\Entity\Category(['description' => $this->category]);
        }

        if (is_object($this->category)) {
            if (isset($this->category->id)) {
                if (!($category = $repository->find($this->category->id))) {
                    throw new BadRequestException("Categoria [{$this->category->id}] não encontrada");
                }
                return $this->category = $category;
            }
            return $this->category = new \App\Entity\Category($this->category);
        }

        throw new BadRequestException('Parâmetro [category] informado é inválido');
    }

    public function validateTags()
    {
        if (!is_array($this->tags)) {
            throw new BadRequestException('Parâmetro [tags] informado é inválido');
        }

        $this->tags = new \Doctrine\Common\Collections\ArrayCollection($this->tags);

        foreach ($this->tags as $key => $tag) {
            $this->tags[$key] = $this->validateTag($tag);
        }
    }

    public function validateTag($tag)
    {
        $repository = $this->em->getRepository(\App\Entity\Tag::class);

        if (is_int($tag)) {
            if (!($result = $repository->findOneBy(['id' => $tag, 'product' => $this->id]))) {
                throw new BadRequestException("Tag [{$tag}] não encontrada");
            }
            return $result;
        }

        if (is_string($tag)) {
            if ($result = $repository->findOneBy(['description' => $tag, 'product' => $this->id])) {
                return $tag = $result;
            }
            return new \App\Entity\Tag(['description' => $tag]);
        }

        if (is_object($tag)) {
            if (isset($tag->id)) {
                if (!($result = $repository->findOneBy(['id' => $tag->id, 'product' => $this->id]))) {
                    throw new BadRequestException("Categoria [{$tag->id}] não encontrada");
                }
                return $result;
            }
            return new \App\Entity\Tag($tag);
        }

        throw new BadRequestException('Parâmetro [tag] informado é inválido');
    }

    public function validateColors()
    {
        if (!is_array($this->colors)) {
            throw new BadRequestException('Parâmetro [colors] informado é inválido');
        }

        $this->colors = new \Doctrine\Common\Collections\ArrayCollection($this->colors);

        foreach ($this->colors as $key => $color) {
            $this->colors[$key] = $this->validateColor($color);
        }
    }

    public function validateColor($color)
    {
        $repository = $this->em->getRepository(\App\Entity\Color::class);

        if (is_int($color)) {
            if (!($result = $repository->find($color))) {
                throw new BadRequestException("Categoria [{$color}] não encontrada");
            }
            return $result;
        }

        if (is_string($color)) {
            if ($result = $repository->findOneByDescription($color)) {
                return $color = $result;
            }
            return new \App\Entity\Color(['description' => $color]);
        }

        if (is_object($color)) {
            if (isset($color->id)) {
                if (!($result = $repository->find($color->id))) {
                    throw new BadRequestException("Categoria [{$color->id}] não encontrada");
                }
                return $result;
            }
            return new \App\Entity\Color($color);
        }

        throw new BadRequestException('Parâmetro [color] informado é inválido');
    }
}
