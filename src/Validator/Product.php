<?php

namespace App\Validator;

use Doctrine\Common\Collections\ArrayCollection;

use Cajudev\Rest\Validator;
use Cajudev\Rest\Annotations\Validations;
use Cajudev\Rest\Exceptions\BadRequestException;

class Product extends \Cajudev\Rest\Validator
{
    /**
     * @Validations\Strings(maxlength=255, required=true)
     */
    public $name;

    /**
     * @Validations\Strings(maxlength=255, required=true)
     */
    public $description;

    /**
     * @Validations\Mixed(types={"integer", "string", "object"}, required=true)
     */
    public $category;

    /**
     * @Validations\Arrays(types={"integer", "string", "object"}, required=true)
     */
    public $tags;

    /**
     * @Validations\Arrays(types={"integer", "string"}, required=true)
     */
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

            $validator = new \App\Validator\Category(['description' => $category]);
            $validator->validate(Validator::INSERT);
    
            return $this->category = new \App\Entity\Category($validator->payload());
        }

        if (isset($this->category->id)) {
            if (!($category = $repository->find($this->category->id))) {
                throw new BadRequestException("Categoria [{$this->category->id}] não encontrada");
            }
            return $this->category = $category;
        }

        $validator = new \App\Validator\Category($category);
        $validator->validate(Validator::INSERT);

        return $this->category = new \App\Entity\Category($validator->payload());
    }

    public function validateTags()
    {
        if (!is_array($this->tags)) {
            throw new BadRequestException('Parâmetro [tags] informado é inválido');
        }

        $this->tags = new ArrayCollection($this->tags);

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
                return $result;
            }

            $validator = new \App\Validator\Tag(['description' => $tag]);
            $validator->validate(Validator::INSERT);

            return new \App\Entity\Tag($validator->payload());
        }

        if (isset($tag->id)) {
            if (!($result = $repository->findOneBy(['id' => $tag->id, 'product' => $this->id]))) {
                throw new BadRequestException("Categoria [{$tag->id}] não encontrada");
            }
            return $result;
        }
        
        $validator = new \App\Validator\Tag($tag);
        $validator->validate(Validator::INSERT);

        return new \App\Entity\Tag($validator->payload());
    }

    public function validateColors()
    {
        if (!is_array($this->colors)) {
            throw new BadRequestException('Parâmetro [colors] informado é inválido');
        }

        $this->colors = new ArrayCollection($this->colors);

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

        if ($result = $repository->findOneByDescription($color)) {
            return $color = $result;
        }

        $validator = new \App\Validator\Color($color);
        $validator->validate(Validator::INSERT);

        return new \App\Entity\Color($validator->payload());
    }
}
