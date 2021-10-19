<?php

namespace Kwarcek\FurgonetkaRestApi\Request;

use Kwarcek\FurgonetkaRestApi\Entity\PickupDate;
use Kwarcek\FurgonetkaRestApi\Traits\ResponseTrait;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;

/**
 * Class PickupRequest
 * @package Kwarcek\FurgonetkaRestApi\Request
 */
class PickupRequest extends Request
{
    use ResponseTrait;

    /**
     * @param string $uuid
     * @return array
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
     * @return array
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