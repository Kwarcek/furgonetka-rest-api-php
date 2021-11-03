<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Address
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Address extends Entity
{
    /** @var string $postCode */
    public string $postCode = '';

    /** @var string $street */
    public string $street = '';

    /** @var string $city */
    public string $city = '';

    /** @var string $countryCode */
    public string $countryCode = '';

    /**
     * @return array
     */
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
