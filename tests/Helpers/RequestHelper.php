<?php

namespace Kwarcek\FurgonetkaRestApi\Test\Helpers;

use Kwarcek\FurgonetkaRestApi\Config\Credentials;
use Kwarcek\FurgonetkaRestApi\FurgonetkaAuth;
use Kwarcek\FurgonetkaRestApi\Request\OrderRequest;
use Kwarcek\FurgonetkaRestApi\Request\PackageRequest;
use Kwarcek\FurgonetkaRestApi\Test\Traits\EntityFactory;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;

/**
 * Trait RequestHelper
 * @package Kwarcek\FurgonetkaRestApi\Test\Helpers
 */
class RequestHelper
{
    use EntityFactory;

    private PackageRequest $packageRequest;

    public function __construct()
    {
        $this->packageRequest = new PackageRequest();
    }

    /**
     * @return array
     * @throws FurgonetkaApiException
     */
    public function addPackage(): array
    {
        $package = $this->getPackage();

        return $this->packageRequest->addPackage(
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
        return $this->packageRequest->getPickupDateProposition(
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
    {
        return (new OrderRequest())->orderShipments(
            $uuid,
            $packages
        );
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getToken(): string
    {
        $credentials = Credentials::toArray();

        return (new FurgonetkaAuth(
            $credentials['client_id'],
            $credentials['client_secret'],
            $credentials['username'],
            $credentials['password'],
            $credentials['auth_url'],
        ))->login()['access_token'];
    }
}