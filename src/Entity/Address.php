<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Address
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Address extends Entity
{
    public string $postCode = '';
    public string $street = '';
    public string $city = '';
    public string $countryCode = '';

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
