<?php

namespace Kwarcek\FurgonetkaRestApi\Factory;

use Kwarcek\FurgonetkaRestApi\Entity\AddressDetails;

/**
 * Class SenderFactory
 * @package Kwarcek\FurgonetkaRestApi\Factory
 */
class SenderFactory extends Factory
{
    public static function getEntity(): AddressDetails
    {
        $sender = new AddressDetails();
        $sender->city = 'Knurów';
        $sender->company = 'Furgonetka TEST';
        $sender->county = '';
        $sender->email = 'kontakt@furgonetka.pl';
        $sender->name = 'Furgonetka Test';
        $sender->phone = '221120835';
        $sender->point = '';
        $sender->postcode = '03-422';
        $sender->street = 'Inżynierska 8';

        return $sender;
    }
}