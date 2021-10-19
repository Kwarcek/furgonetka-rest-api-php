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

    /**
     * @param string $uuid
     * @return array
     * @throws FurgonetkaApiException
     */
    public function orderShipmentsSummary(string $uuid)
    {
        $response = $this->client->get("/order-commands/{$uuid}");

        return $this->response($response);
    }

    /**
     * @param string $uuid
     * @param array $packages
     * @param Label|null $label
     * @return array
     * @throws FurgonetkaApiException
     */
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