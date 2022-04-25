<?php

namespace Kwarcek\FurgonetkaRestApi\Test\Helpers;

use Kwarcek\FurgonetkaRestApi\Factory\PackageFactory;
use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\Request\OrderRequest;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;
use Kwarcek\FurgonetkaRestApi\Request\PackageRequest;

/**
 * Trait RequestHelper
 * @package Kwarcek\FurgonetkaRestApi\Test\Helpers
 */
class RequestHelper
{
    private FurgonetkaClient $client;

    public function __construct(FurgonetkaClient $client)
    {
        $this->client = $client;
    }

    /** @throws FurgonetkaApiException */
    public function addPackage(): array
    {
        $package = PackageFactory::getEntity();
        $packageRequest = new PackageRequest($this->client);

        return $packageRequest->addPackage(
            $package->pickup,
            $package->receiver,
            $package->serviceId,
            $package->parcels,
            $package->sender,
            $package->additionalServices,
            $package->userReferenceNumber,
            $package->type,
            $package->payer
        );
    }

    /** @throws FurgonetkaApiException */
    public function getPickupHoursProposition(array $packages, string $date): array
    {
        $packageRequest = new PackageRequest($this->client);

        return $packageRequest->getPickupDateProposition(
            $packages,
            $date
        );
    }

    /** @throws FurgonetkaApiException */
    public function orderShipments(string $uuid, array $packages): array
    { //todo
        $orderRequest = new OrderRequest($this->client);

        return $orderRequest->orderShipments(
            $uuid,
            $packages
        );
    }
}