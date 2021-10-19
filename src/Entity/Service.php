<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Service
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Service extends Entity
{
    public array $service;
    public array $serviceId;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'service' => $this->service,
            'service_id' => $this->serviceId,
        ];
    }
}
