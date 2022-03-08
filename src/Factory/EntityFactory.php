<?php

namespace Kwarcek\FurgonetkaRestApi\Factory;

use Kwarcek\FurgonetkaRestApi\Entity\AdditionalServices;
use Kwarcek\FurgonetkaRestApi\Entity\AddressDetails;
use Kwarcek\FurgonetkaRestApi\Entity\Package;
use Kwarcek\FurgonetkaRestApi\Entity\Parcel;

/**
 * Class EntityFactory
 * @package Kwarcek\FurgonetkaRestApi\Test\Factory
 */
class EntityFactory
{
    public function getPickup(): AddressDetails
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

    public function getReceiver(): AddressDetails
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

    public function getSender(): AddressDetails
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

    public function getAdditionalServices(): AdditionalServices
    {
        return new AdditionalServices();
    }

    public function getParcel(): Parcel
    {
        $parcel = new Parcel();
        $parcel->width = 20;
        $parcel->depth = 20;
        $parcel->height = 20;
        $parcel->weight = 3;
        $parcel->value = 500;
        $parcel->description = 'Black salami';

        return $parcel;
    }

    public function getPackage(): Package
    {
        $package = new Package();
        $package->pickup = $this->getPickup();
        $package->receiver = $this->getReceiver();
        $package->serviceId = '8800592';
        $package->parcels = [$this->getParcel()];
        $package->sender = $this->getSender();
        $package->payer = null;
        $package->userReferenceNumber = '';
        $package->type = 'package';
        $package->additionalServices = $this->getAdditionalServices();

        return $package;
    }
}