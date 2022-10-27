<?php

namespace Kwarcek\FurgonetkaRestApi\Request;

use Kwarcek\FurgonetkaRestApi\Entity\PickupDate;
use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\Traits\ResponseTrait;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;

/**
 * Class PickupRequest
 * @package Kwarcek\FurgonetkaRestApi\Request
 */
class PickupRequest extends Request
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
     *              errors: array,
     *              uuid: string,
     *             },
     *        }
     * @throws FurgonetkaApiException
     */
    public function orderCourierDriveSummary(string $uuid): array
    {
        $response = $this->client->get(
                '/pickup-commands/'.$uuid,
        );

        return $this->response($response);
    }

    /**
     * @param string $uuid
     * @param array $packages
     * @param PickupDate $pickupDate
     *
     * @return array{
     *            code: integer,
     *            data: array{
     *              uuid: string,
     *             },
     *        }
     * @throws FurgonetkaApiException
     */
    public function orderCourierDrive(
        string $uuid,
        array $packages,
        PickupDate $pickupDate
    ): array
    {
        $response = $this->client->put(
            "/pickup-commands/{$uuid}", [
            'packages' => $packages,
            'pickup_date' => $pickupDate->toArray(),
        ]);

        return $this->response($response);
    }
}