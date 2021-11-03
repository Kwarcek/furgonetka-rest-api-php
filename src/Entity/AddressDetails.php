<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class AddressDetails
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class AddressDetails extends Entity
{
    /** @var string $street */
    public string $street = '';

    /** @var string $postcode */
    public string $postcode = '';

    /** @var string $city */
    public string $city = '';

    /** @var string $name */
    public string $name = '';

    /** @var string $company */
    public string $company = '';

    /** @var string $countryCode */
    public string $countryCode = 'PL';

    /** @var string $county */
    public string $county = '';

    /** @var string $email */
    public string $email = '';

    /** @var string $phone */
    public string $phone = '';

    /** @var string $point */
    public string $point = '';

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'street' => $this->street,
            'postcode' => $this->postcode,
            'city' => $this->city,
            'name' => $this->name,
            'company' => $this->company,
            'country_code' => $this->countryCode,
            'county' => $this->county,
            'email' => $this->email,
            'phone' => $this->phone,
            'point' => $this->point,
        ];
    }
}
