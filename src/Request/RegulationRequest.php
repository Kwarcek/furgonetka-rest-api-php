<?php

namespace Kwarcek\FurgonetkaRestApi\Request;

use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;
use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\Traits\ResponseTrait;

/**
 * Class RegulationRequest
 * @package Kwarcek\FurgonetkaRestApi\Request
 */
class RegulationRequest extends Request
{
    use ResponseTrait;

    protected FurgonetkaClient $client;

    public function __construct(FurgonetkaClient $client)
    {
        $this->client = $client;
    }

    /** @throws FurgonetkaApiException */
    public function getRegulations(): array
    {
        $response = $this->client->get('/regulations');

        return $this->response($response);
    }

    /** @throws FurgonetkaApiException */
    public function acceptCarrierRegulations(array $regulations): array
    {
        $response = $this->client->post('/regulations', [
            'regulations' => $regulations
        ]);

        return $this->response($response);
    }
}