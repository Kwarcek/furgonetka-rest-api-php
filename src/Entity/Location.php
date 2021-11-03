<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Location
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Location extends Entity
{
    /** @var Coordinate $coordinate */
    public Coordinate $coordinate;

    /** @var string $searchPhrase */
    public string $searchPhrase = '';

    /** @var Address $address */
    public Address $address;

    /** @var float $pointsMaxDistance */
    public float $pointsMaxDistance = 10.00;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
          'coordinates' => $this->coordinate->toArray(),
          'search_phrase' => $this->searchPhrase,
          'address' => $this->address->toArray(),
          'points_max_distance' => $this->pointsMaxDistance,
        ];
    }
}
