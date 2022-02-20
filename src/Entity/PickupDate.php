<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class PickupDate
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class PickupDate extends Entity
{
    public string $date = '';
    public string $minTime = '';
    public string $maxTime = '';

    public function toArray(): array
    {
        return [
          'date' => $this->date,
          'min_time' => $this->minTime,
          'max_time' => $this->maxTime,
        ];
    }
}
