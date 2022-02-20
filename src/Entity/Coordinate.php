<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Coordinate
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Coordinate extends Entity
{
    public float $latitude;
    public float $longitude;

    public function toArray(): array
    {
        return [
          'latitude' => $this->latitude,
          'longitude' => $this->longitude,
        ];
    }
}