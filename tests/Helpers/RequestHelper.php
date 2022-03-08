<?php

namespace Kwarcek\FurgonetkaRestApi\Test\Helpers;

use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\Request\OrderRequest;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;
use Kwarcek\FurgonetkaRestApi\Factory\EntityFactory;

/**
 * Trait RequestHelper
 * @package Kwarcek\FurgonetkaRestApi\Test\Helpers
 */
class RequestHelper
{
    private FurgonetkaClient $client;
    private EntityFactory $entityFactory;

    public function __construct(FurgonetkaClient $client)
    {
        $this->client = $client;
        $this->entityFactory = new EntityFactory();

    }

    /** @throws FurgonetkaApiException */
    public function addPackage(): array
    {
        $package = $this->entityFactory->getPackage();

        return $this->client->package()->addPackage(
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
        return $this->client->package()->getPickupDateProposition(
            $packages,
            $date
        );
    }

    /** @throws FurgonetkaApiException */
    public function orderShipments(string $uuid, array $packages): array
    { //todo
        return (new OrderRequest($this->client))->orderShipments(
            $uuid,
            $packages
        );
    }
}