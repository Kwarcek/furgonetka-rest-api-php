<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class MapBound
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class MapBound extends Entity
{
    /** @var Coordinate $northWest */
    public Coordinate $northWest;

    /** @var Coordinate $northEast */
    public Coordinate $northEast;

    /** @var Coordinate $southWest */
    public Coordinate $southWest;

    /** @var Coordinate $southEast */
    public Coordinate $southEast;

    /**
     * @return array
     */
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