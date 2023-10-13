<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Address
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Address extends Entity
{
    public ?string $postCode = null;
    public ?string $street = null;
    public ?string $city = null;
    public ?string $countryCode = null;

    public function toArray(): array
    {
        return [
          'postcode' => $this->postCode,
          'street' => $this->street,
          'city' => $this->city,
          'country_code' => $this->countryCode,
        ];
    }
}
