<?php

namespace Kwarcek\FurgonetkaRestApi\Factory;

use Kwarcek\FurgonetkaRestApi\Entity\Parcel;

/**
 * Class ParcelFactory
 * @package Kwarcek\FurgonetkaRestApi\Factory
 */
class ParcelFactory extends Factory
{
    public static function getEntity(): Parcel
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
}