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

    /**
     * @param string $uuid
     *
     * @return array{
     *            code: integer,
     *            data: array{
     *              status: string,
     *              datetime_change: string|null,
     *              errors: object[],
     *              uuid: string,
     *             },
     *        }
     * @throws FurgonetkaApiException
     */
    public function orderShipmentsSummary(string $uuid): array
    {
        $response = $this->client->get("/order-commands/{$uuid}");

        return $this->response($response);
    }

    /**
     * @param string $uuid
     * @param object[] $packages
     * @param ?Label $label
     *
     * @return array{
     *            code: integer,
     *            data: array{
     *              uuid: string,
     *             },
     *        }
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