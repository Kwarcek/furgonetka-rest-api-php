<?php

namespace Kwarcek\FurgonetkaRestApi\Factory;

use Kwarcek\FurgonetkaRestApi\Entity\AddressDetails;

/**
 * Class ReceiverFactory
 * @package Kwarcek\FurgonetkaRestApi\Factory
 */
class ReceiverFactory extends Factory
{
    public static function getEntity(): AddressDetails
    {
        $receiver = new AddressDetails();
        $receiver->city = 'Katowice';
        $receiver->company = 'DPD Pickup Oddział Miejski';
        $receiver->county = '';
        $receiver->email = 'contact@dpd.com';
        $receiver->name = 'DPD Test';
        $receiver->phone = '225775555';
        $receiver->point = '';
        $receiver->postcode = '40-097';
        $receiver->street = '3 maja 40';

        return $receiver;
    }
}