<?php

namespace Kwarcek\FurgonetkaRestApi\Factory;

use Kwarcek\FurgonetkaRestApi\Entity\AddressDetails;

/**
 * Class PickupFactory
 * @package Kwarcek\FurgonetkaRestApi\Factory
 */
class PickupFactory extends Factory
{
    public static function getEntity(): AddressDetails
    {
        $pickup = new AddressDetails();
        $pickup->city = 'Knurów';
        $pickup->company = 'Furgonetka TEST';
        $pickup->county = '';
        $pickup->email = 'kontakt@furgonetka.pl';
        $pickup->name = 'Furgonetka Test';
        $pickup->phone = '221120835';
        $pickup->point = '';
        $pickup->postcode = '03-422';
        $pickup->street = 'Inżynierska 8';

        return $pickup;
    }
}