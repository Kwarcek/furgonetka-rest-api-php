<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Coordinate
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Coordinate extends Entity
{
    /** @var float $latitude */
    public float $latitude;

    /** @var float $longitude */
    public float $longitude;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
          'latitude' => $this->latitude,
          'longitude' => $this->longitude,
        ];
    }
}