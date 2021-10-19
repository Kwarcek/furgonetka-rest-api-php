<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Parcel
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Parcel extends Entity
{
    public int $width;
    public int $depth;
    public int $height;
    public float $weight;
    public float $value;
    public string $description;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'width' => $this->width,
            'depth' => $this->depth,
            'height' => $this->height,
            'weight' => $this->weight,
            'value' => $this->value,
            'description' => $this->description,
        ];
    }
}