<?php

namespace Kwarcek\FurgonetkaRestApi\Request;

use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\Traits\ResponseTrait;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;

/**
 * Class ConfigurationRequest
 * @package Kwarcek\FurgonetkaRestApi\Request
 */
class ConfigurationRequest extends Request
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
    public function getAllowedCountries(): array
    {
        $response = $this->client->get('/configuration/allowed-countries');

        return $this->response($response);
    }

    /**
     * @return array
     * @throws FurgonetkaApiException
     */
    public function getCarriersStatements(): array
    {
        $response = $this->client->get('/configuration/services-statements');

        return $this->response($response);
    }
}