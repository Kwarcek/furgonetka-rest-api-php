<?php

namespace Kwarcek\FurgonetkaRestApi\Factory;

use Kwarcek\FurgonetkaRestApi\Entity\Package;

/**
 * Class PackageFactory
 * @package Kwarcek\FurgonetkaRestApi\Factory
 */
class PackageFactory extends Factory
{
    public static function getEntity(): Package
    {
        $package = new Package();
        $package->pickup = PickupFactory::getEntity();
        $package->receiver = ReceiverFactory::getEntity();
        $package->serviceId = '8800592';
        $package->parcels = [ParcelFactory::getEntity()];
        $package->sender = SenderFactory::getEntity();
        $package->payer = null;
        $package->userReferenceNumber = '';
        $package->type = 'package';
        $package->additionalServices = AdditionalServiceFactory::getEntity();

        return $package;
    }
}