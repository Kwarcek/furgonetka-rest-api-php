<?php

namespace Kwarcek\FurgonetkaRestApi\Request;

use Kwarcek\FurgonetkaRestApi\Entity\Label;
use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\Traits\ResponseTrait;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;

/**
 * Class OrderRequest
 * @package Kwarcek\FurgonetkaRestApi\Request
 */
class OrderRequest extends Request
{
    use ResponseTrait;

    protected FurgonetkaClient $client;

    public function __construct(FurgonetkaClient $client)
    {
        $this->client = $client;
    }

    /** @throws FurgonetkaApiException */
    public function orderShipmentsSummary(string $uuid)
    {
        $response = $this->client->get("/order-commands/{$uuid}");

        return $this->response($response);
    }

    /** @throws FurgonetkaApiException */
    public function orderShipments(
        string $uuid,
        array $packages,
        ?Label $label = null
    ): array
    {
        $response = $this->client->put("/order-commands/{$uuid}", [
            'packages' => $packages,
            'label' => ($label) ? $label->toArray() : null,
        ]);

        return $this->response($response);
    }
}