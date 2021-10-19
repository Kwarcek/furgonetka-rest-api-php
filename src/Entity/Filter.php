<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Filter
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Filter extends Entity
{
    public array $services;
    public array $pointTypes;
    public MapBound $mapBound;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'services' => $this->services,
            'point_types' => $this->pointTypes,
            'map_bounds' => $this->mapBound->toArray(),
        ];
    }
}