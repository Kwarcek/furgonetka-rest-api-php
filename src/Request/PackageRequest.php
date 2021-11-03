<?php

namespace Kwarcek\FurgonetkaRestApi\Request;

use Kwarcek\FurgonetkaRestApi\Entity\AdditionalServices;
use Kwarcek\FurgonetkaRestApi\Entity\AddressDetails;
use Kwarcek\FurgonetkaRestApi\Entity\Label;
use Kwarcek\FurgonetkaRestApi\Entity\Package;
use Kwarcek\FurgonetkaRestApi\Entity\Parcel;
use Kwarcek\FurgonetkaRestApi\Entity\Payer;
use Kwarcek\FurgonetkaRestApi\Entity\Service;
use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\Traits\ResponseTrait;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;

/**
 * Class PackageRequest
 * @package Kwarcek\FurgonetkaRestApi\Request
 */
class PackageRequest extends Request
{
    use ResponseTrait;

    /** @var FurgonetkaClient $client */
    protected FurgonetkaClient $client;

    public function __construct(FurgonetkaClient $client)
    {
        $this->client = $client;
    }

    const PACKAGE_TYPE_PACKAGE = 'package';
    const PACKAGE_TYPE_DOX = 'dox';
    const PACKAGE_TYPE_PALLET = 'pallet';

    const LIST_TYPE_ALL = 'all';
    const LIST_TYPE_SENT = 'sent';
    const LIST_TYPE_WAITING = 'waiting';

    /**
     * @param AddressDetails $pickup
     * @param AddressDetails $receiver
     * @param int $serviceId
     * @param array $parcels
     * @param AddressDetails $sender
     * @param AdditionalServices $additionalServices
     * @param string $type
     * @param string|null $userReferenceNumber
     * @param Payer|null $payer
     * @return array
     * @throws FurgonetkaApiException
     */
    public function validatePackage(
        AddressDetails $pickup,
        AddressDetails $receiver,
        int $serviceId,
        array $parcels,
        AddressDetails $sender,
        AdditionalServices $additionalServices,
        string $type = self::PACKAGE_TYPE_PACKAGE,
        ?string $userReferenceNumber = null,
        ?Payer $payer = null
    ): array
    {
        $response = $this->client->post('/packages/validate', [
            'pickup' => $pickup->toArray(),
            'receiver' => $receiver->toArray(),
            'service_id' => $serviceId,
            'parcels' => $parcels,
            'sender' => $sender->toArray(),
            'payer' => ($payer) ? $payer->toArray() : null,
            'user_reference_number' => $userReferenceNumber,
            'type' => $type,
            'additional_services' => $additionalServices->toArray(),
        ]);

        return $this->response($response);
    }

    /**
     * @param string $packageId
     * @return array
     * @throws FurgonetkaApiException
     */
    public function trackShipment(string $packageId): array
    {
        $response = $this->client->get("/packages/$packageId/tracking");

        return $this->response($response);
    }

    /**
     * @param array $packages
     * @param string $readyDate
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getPickupDateProposition(array $packages, string $readyDate): array
    {
        $response = $this->client->post('/packages/pickup-date-proposals', [
            'packages' => $packages,
            'read_date' => $readyDate,
        ]);

        return $this->response($response);
    }

    /**
     * @param array $packages
     * @return array
     * @throws FurgonetkaApiException
     */
    public function generateProtocol(array $packages): array
    {
        $response = $this->client->post('/packages/protocol', [
            'packages' => $packages,
        ]);

        return $this->response($response);
    }

    /**
     * @param string $packageId
     * @param Label|null $label
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getLabel(string $packageId, ?Label $label = null): array
    {
        $response = $this->client->get("/packages/$packageId/label", [
            'label' => ($label) ? $label->pageFormat : null,
        ]);

        return $this->response($response);
    }

    /**
     * @param string $packageId
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getPackageDetails(string $packageId): array
    {
        $response = $this->client->get("/packages/{$packageId}");

        return $this->response($response);
    }

    /**
     * @param string $packageId
     * @return array
     * @throws FurgonetkaApiException
     */
    public function deletePackage(string $packageId): array
    {
        $response = $this->client->delete("/packages/$packageId");

        return $this->response($response);
    }

    /**
     * @param string $packageId
     * @param AddressDetails $pickup
     * @param AddressDetails $receiver
     * @param int $serviceId
     * @param Parcel $parcel
     * @param AddressDetails $sender
     * @param AdditionalServices|null $additionalServices
     * @param Payer|null $payer
     * @param string $type
     * @param string|null $userReferenceNumber
     * @return array
     * @throws FurgonetkaApiException
     */
    public function editPackage(
        string $packageId,
        AddressDetails $pickup,
        AddressDetails $receiver,
        int $serviceId,
        Parcel $parcel,
        AddressDetails $sender,
        ?AdditionalServices $additionalServices,
        ?Payer $payer = null,
        string $type = self::PACKAGE_TYPE_PACKAGE,
        ?string $userReferenceNumber = null
    ): array
    {
        $response = $this->client->put("/packages/{$packageId}", [
            'pickup' => $pickup->toArray(),
            'receiver' => $receiver->toArray(),
            'service_id' => $serviceId,
            'parcels' => $parcel->toArray(),
            'sender' => $sender->toArray(),
            'payer' => ($payer) ? $payer->toArray() : null,
            'user_reference_number' => $userReferenceNumber,
            'type' => $type,
            'additional_services' => ($additionalServices) ? $additionalServices->toArray() : null,
        ]);

        return $this->response($response);
    }

    /**
     * @param Package $package
     * @param Service $service
     * @return array
     * @throws FurgonetkaApiException
     */
    public function calculatePackagePrice(Package $package, Service $service): array
    {
        $response = $this->client->post('/packages/calculate-price', [
            'package' => $package,
            'services' => $service,
        ]);

        return $this->response($response);
    }

    /**
     * @param string $consigmentNoteNumber
     * @param string|null $service
     * @param string $name
     * @return array
     * @throws FurgonetkaApiException
     */
    public function addPackageToTracking(
        string $consigmentNoteNumber,
        ?string $service = null,
        string $name = ''
    ): array
    {
        $response = $this->client->post('/packages/add-to-tracking', [
            'package_no' => $consigmentNoteNumber,
            'service' => $service,
            'name' => $name,
        ]);

        return $this->response($response);
    }

    /**
     * @param AddressDetails $pickup
     * @param AddressDetails $receiver
     * @param int $serviceId
     * @param array $parcels
     * @param AddressDetails $sender
     * @param AdditionalServices|null $additionalServices
     * @param string|null $userReferenceNumber
     * @param string $type
     * @param Payer|null $payer
     * @return array
     * @throws FurgonetkaApiException
     */
    public function addPackage(
        AddressDetails $pickup,
        AddressDetails $receiver,
        int $serviceId,
        array $parcels,
        AddressDetails $sender,
        ?AdditionalServices $additionalServices,
        ?string $userReferenceNumber = null,
        string $type = self::PACKAGE_TYPE_PACKAGE,
        ?Payer $payer = null
    ): array
    {
        $response = $this->client->post('/packages', [
            'pickup' => $pickup->toArray(),
            'receiver' => $receiver->toArray(),
            'service_id' => $serviceId,
            'parcels' => $parcels,
            'sender' => $sender->toArray(),
            'payer' => ($payer) ? $payer->toArray() : null,
            'user_reference_number' => $userReferenceNumber,
            'type' => $type,
            'additional_services' => ($additionalServices) ? $additionalServices->toArray() : null,
        ]);

        return $this->response($response);
    }

    /**
     * @param int|null $lastPackageId
     * @param int|null $limit
     * @param string $listType
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getPackagesList(
        ?int $lastPackageId = null,
        ?int $limit = null,
        string $listType = self::LIST_TYPE_ALL
    ): array
    {
        $response = $this->client->get('/packages', [
            'limit' => $limit,
            'last_package_id' => $lastPackageId,
            'list_type' => $listType,
        ]);

        return $this->response($response);
    }

    /**
     * @param array $package
     * @return array
     * @throws FurgonetkaApiException
     */
    public function deletePackages(array $package): array
    {
        $response = $this->client->delete('/packages', [
            'packages' => $package
        ]);

        return $this->response($response);
    }
}