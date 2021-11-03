<?php

namespace Kwarcek\FurgonetkaRestApi\Request;

use Kwarcek\FurgonetkaRestApi\Entity\Agreement;
use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\Traits\ResponseTrait;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AccountRequest
 * @package Kwarcek\FurgonetkaRestApi\Request
 */
class AccountRequest extends Request
{
    use ResponseTrait;

    /** @var FurgonetkaClient $client */
    protected FurgonetkaClient $client;

    public function __construct(FurgonetkaClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getCarrierList(): array
    {
        $response = $this->client->get('/account/services');

        return $this->response($response);
    }

    /**
     * @param string $partnerUserId
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getOAuthData(string $partnerUserId): array
    {
        $response = $this->client->get("/account/token/{$partnerUserId}");

        return $this->response($response);
    }

    /**
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getAccountAdvancedSettings(): array
    {
        $response = $this->client->get('/account/settings/advanced');

        return $this->response($response);
    }

    /**
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getlistOfShipmentTemplates(): array
    {
        $response = $this->client->get('/account/package-templates');

        return $this->response($response);
    }

    /**
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getListOfEntriesInTheAddressBook(): array
    {
        $response = $this->client->get('/account/address-book');

        return $this->response($response);
    }

    /**
     * @param string $uuid
     * @param Agreement $agreement
     * @return array
     * @throws FurgonetkaApiException
     */
    public function dhlAgreement(string $uuid, Agreement $agreement): array
    {
        $response = $this->client->put("/account/service-command/dhl/{$uuid}", [
            'name' => $agreement->name,
            'credentials' => [
                'user' => $agreement->credential->user,
                'password' => $agreement->credential->password,
                'sap' => $agreement->credential->sap,
            ],
            'service_id' => $agreement->serviceId,
            'credentials_parcelshop' => [
                'user' => $agreement->additionalCredential->user,
                'password' => $agreement->additionalCredential->password,
            ],
        ]);

        return $this->response($response);
    }

    /**
     * @param string $uuid
     * @param Agreement $agreement
     * @return array
     * @throws FurgonetkaApiException
     */
    public function dpdAgreement(string $uuid, Agreement $agreement): array
    {
        $response = $this->client->put("/account/service-command/dpd/{$uuid}", [
            'name' => $agreement->name,
            'credentials' => [
                'login' => $agreement->credential->login,
                'password' => $agreement->credential->password,
                'master_fid' => $agreement->credential->masterFid,
            ],
            'service_id' => $agreement->serviceId,
            'credentials_import' => [
                'login' => $agreement->additionalCredential->user,
                'password' => $agreement->additionalCredential->password,
                'master_fid' => $agreement->additionalCredential->masterFid,
            ],
        ]);

        return $this->response($response);
    }

    /**
     * @param string $uuid
     * @param Agreement $agreement
     * @return array
     * @throws FurgonetkaApiException
     */
    public function fedexAgreement(string $uuid, Agreement $agreement): array
    {
        $response = $this->client->put("/account/service-command/fedex/{$uuid}", [
            'name' => $agreement->name,
            'credentials' => [
                'account_number' => $agreement->credential->accountNumber,
                'key' => $agreement->credential->key,
            ],
            'service_id' => $agreement->serviceId,
            'credentials_international' => [
                'account_number' => $agreement->additionalCredential->accountNumber,
                'meter_number' => $agreement->additionalCredential->meterNumber,
                'key' => $agreement->additionalCredential->key,
                'password' => $agreement->additionalCredential->password,
            ],
        ]);

        return $this->response($response);
    }

    /**
     * @param string $uuid
     * @param Agreement $agreement
     * @return array
     * @throws FurgonetkaApiException
     */
    public function glsAgreement(string $uuid, Agreement $agreement): array
    {
        $response = $this->client->put("/account/service-command/gls/{$uuid}", [
            'name' => $agreement->name,
            'credentials' => [
                'user' => $agreement->credential->user,
                'password' => $agreement->credential->password,
            ],
            'service_id' => $agreement->serviceId,
        ]);

        return $this->response($response);
    }

    /**
     * @param string $uuid
     * @param Agreement $agreement
     * @return array
     * @throws FurgonetkaApiException
     */
    public function inpostAgreement(string $uuid, Agreement $agreement): array
    {
        $response = $this->client->put("/account/service-command/inpost/{$uuid}", [
            'name' => $agreement->name,
            'credentials' => [
                'shipx_client_id' => $agreement->credential->shipxClientId,
                'shipx_token' => $agreement->credential->shipxToken,
                'allegro_deal' => $agreement->credential->allegroDeal,
            ],
            'service_id' => $agreement->serviceId,
        ]);

        return $this->response($response);
    }

    /**
     * @param string $uuid
     * @param Agreement $agreement
     * @return array
     * @throws FurgonetkaApiException
     */
    public function orlenAgreement(string $uuid, Agreement $agreement): array
    {
        $response = $this->client->put("/account/service-command/orlen/{$uuid}", [
            'name' => $agreement->name,
            'credentials' => [
                'user' => $agreement->credential->user,
                'password' => $agreement->credential->password,
            ],
            'service_id' => $agreement->serviceId,
        ]);

        return $this->response($response);
    }

    /**
     * @param string $uuid
     * @param Agreement $agreement
     * @return array
     * @throws FurgonetkaApiException
     */
    public function pocztaPolskaAgreement(string $uuid, Agreement $agreement): array
    {
        $response = $this->client->put("/account/service-command/poczta/{$uuid}", [
            'name' => $agreement->name,
            'credentials' => [
                'email' => $agreement->credential->email,
                'password' => $agreement->credential->password,
                'post_office_id' => $agreement->credential->postOfficeId,
            ],
            'service_id' => $agreement->serviceId,
        ]);

        return $this->response($response);
    }

    /**
     * @param string $uuid
     * @param Agreement $agreement
     * @return array
     * @throws FurgonetkaApiException
     */
    public function upsAgreement(string $uuid, Agreement $agreement): array
    {
        $response = $this->client->put("/account/service-command/ups/{$uuid}", [
            'name' => $agreement->name,
            'credentials' => [
                'shipper_number' => $agreement->credential->shipperNumber,
                'user_id' => $agreement->credential->userId,
                'password' => $agreement->credential->password,
            ],
            'service_id' => $agreement->serviceId,
        ]);

        return $this->response($response);
    }

    /**
     * @param string $uuid
     * @return array
     * @throws FurgonetkaApiException
     */
    public function agreementSummary(string $uuid): array
    {
        $response = $this->client->get("/account/service-command/{$uuid}");

        return $this->response($response);
    }

    /**
     * @param string $serviceId
     * @return array
     * @throws FurgonetkaApiException
     */
    public function deleteAgreement(string $serviceId): array
    {
        $response = $this->client->delete("/account/service-delete/{$serviceId}");

        return $this->response($response);
    }

    /**
     * @param string $serviceId
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getDhlAgreement(string $serviceId): array
    {
        $response = $this->getAgreements('dhl', $serviceId);

        return $this->response($response);
    }

    /**
     * @param string $serviceId
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getDpdAgreement(string $serviceId): array
    {
        $response = $this->getAgreements('dpd', $serviceId);

        return $this->response($response);
    }

    /**
     * @param string $serviceId
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getFedexAgreement(string $serviceId): array
    {
        $response = $this->getAgreements('fedex', $serviceId);

        return $this->response($response);
    }

    /**
     * @param string $serviceId
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getGlsAgreement(string $serviceId): array
    {
        $response = $this->getAgreements('gls', $serviceId);

        return $this->response($response);
    }

    /**
     * @param string $serviceId
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getInpostAgreement(string $serviceId): array
    {
        $response = $this->getAgreements('inpost', $serviceId);

        return $this->response($response);
    }

    /**
     * @param string $serviceId
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getOrlenAgreement(string $serviceId): array
    {
        $response = $this->getAgreements('orlen', $serviceId);

        return $this->response($response);
    }

    /**
     * @param string $serviceId
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getPocztaPolskaAgreement(string $serviceId): array
    {
        $response = $this->getAgreements('poczta', $serviceId);

        return $this->response($response);
    }

    /**
     * @param string $serviceId
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getUpsAgreement(string $serviceId): array
    {
        $response = $this->getAgreements('ups', $serviceId);

        return $this->response($response);
    }

    /**
     * @param string $carrier
     * @param string $serviceId
     * @return ResponseInterface
     * @throws FurgonetkaApiException
     */
    private function getAgreements(string $carrier, string $serviceId): ResponseInterface
    {
        return $this->client->get("/account/service/{$carrier}/{$serviceId}");
    }
    
}