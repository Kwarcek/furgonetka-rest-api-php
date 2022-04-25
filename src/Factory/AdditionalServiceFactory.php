<?php

namespace Kwarcek\FurgonetkaRestApi\Factory;

use Kwarcek\FurgonetkaRestApi\Entity\AdditionalServices;
use Kwarcek\FurgonetkaRestApi\Entity\Cod;

/**
 * Class AdditionalServiceFactory
 * @package Kwarcek\FurgonetkaRestApi\Factory
 */
class AdditionalServiceFactory extends Factory
{
    public static function getEntity(): AdditionalServices
    {
        $additionalServices = new AdditionalServices();
        $cod = new Cod();
        $cod->amount = 21.37;
        $cod->iban = 'PL66109024029731195738422545';
        $cod->name = 'Test';
        $additionalServices->cod = $cod;
        return $additionalServices;
    }
}