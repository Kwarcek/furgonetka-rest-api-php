<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Parcel
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Parcel extends Entity
{
    /** @var int $width */
    public int $width;

    /** @var int $depth */
    public int $depth;

    /** @var int $height */
    public int $height;

    /** @var float $weight */
    public float $weight;

    /** @var float $value */
    public float $value;

    /** @var string $description */
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