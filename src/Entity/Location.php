<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Location
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Location extends Entity
{
    public Coordinate $coordinate;
    public string $searchPhrase = '';
    public Address $address;
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
