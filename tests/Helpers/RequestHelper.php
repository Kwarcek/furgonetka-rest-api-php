<?php

namespace Kwarcek\FurgonetkaRestApi\Test\Helpers;

use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\Request\OrderRequest;
use Kwarcek\FurgonetkaRestApi\Test\Traits\EntityFactory;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;

/**
 * Trait RequestHelper
 * @package Kwarcek\FurgonetkaRestApi\Test\Helpers
 */
class RequestHelper
{
    use EntityFactory;

    private FurgonetkaClient $client;

    public function __construct(FurgonetkaClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     * @throws FurgonetkaApiException
     */
    public function addPackage(): array
    {
        $package = $this->getPackage();

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

    /**
     * @param array $packages
     * @param string $date
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getPickupHoursProposition(array $packages, string $date): array
    {
        return $this->client->package()->getPickupDateProposition(
            $packages,
            $date
        );
    }

    /**
     * @param string $uuid
     * @param array $packages
     * @return array
     * @throws FurgonetkaApiException
     */
    public function orderShipments(string $uuid, array $packages): array
    { //todo
        return (new OrderRequest($this->client))->orderShipments(
            $uuid,
            $packages
        );
    }
}