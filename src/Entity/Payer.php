<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Payer
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Payer extends Entity
{
    public string $costCenter = '';

    public function toArray(): array
    {
        return [
            'cost_center' => $this->costCenter,
        ];
    }
}