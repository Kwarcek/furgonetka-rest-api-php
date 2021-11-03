<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Filter
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Filter extends Entity
{
    /** @var array $services */
    public array $services;

    /** @var array $pointTypes */
    public array $pointTypes;

    /** @var MapBound $mapBound */
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