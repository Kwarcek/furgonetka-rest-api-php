<?php

namespace Kwarcek\FurgonetkaRestApi\Entity\ParcelLocker;

use Kwarcek\FurgonetkaRestApi\Entity\Entity;

/**
 * Class ParcelLockerData
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class ParcelLockerData extends Entity
{
    public string $place = '';
    public string $construction = '';
    public string $additionalInfo = '';

    public function __construct(
        public string $street,
        public string $postcode,
        public string $city,
        public string $size
    ){}

    public function toArray(): array
    {
        return [
            'street' => $this->street,
            'postcode' => $this->postcode,
            'city' => $this->city,
            'size' => $this->size,
            'place' => $this->place,
            'construction' => $this->construction,
            'additional_info' => $this->additionalInfo,
        ];
    }
}
