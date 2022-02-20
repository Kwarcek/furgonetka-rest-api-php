<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class MapBound
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class MapBound extends Entity
{
    public Coordinate $northWest;
    public Coordinate $northEast;
    public Coordinate $southWest;
    public Coordinate $southEast;
    
    public function toArray(): array
    {
        return [
          'north_west' => $this->northWest,
          'north_east' => $this->northEast,
          'south_west' => $this->southWest,
          'south_east' => $this->southEast,
        ];
    }
}