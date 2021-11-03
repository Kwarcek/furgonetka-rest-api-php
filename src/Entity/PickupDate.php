<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class PickupDate
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class PickupDate extends Entity
{
    /** @var string $date */
    public string $date = '';

    /** @var string $minTime */
    public string $minTime = '';

    /** @var string $maxTime */
    public string $maxTime = '';

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
          'date' => $this->date,
          'min_time' => $this->minTime,
          'max_time' => $this->maxTime,
        ];
    }
}
