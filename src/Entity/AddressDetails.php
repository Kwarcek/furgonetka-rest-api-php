<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class AddressDetails
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class AddressDetails extends Entity
{
    public string $street = '';
    public string $postcode = '';
    public string $city = '';
    public string $name = '';
    public string $company = '';
    public string $countryCode = 'PL';
    public string $county = '';
    public string $email = '';
    public string $phone = '';
    public string $point = '';

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
