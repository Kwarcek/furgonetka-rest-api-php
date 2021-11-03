<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Payer
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Payer extends Entity
{
    /** @var string $costCenter */
    public string $costCenter = '';

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'cost_center' => $this->costCenter,
        ];
    }
}