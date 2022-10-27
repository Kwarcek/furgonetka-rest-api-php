<?php

namespace Kwarcek\FurgonetkaRestApi\Request;

use Kwarcek\FurgonetkaRestApi\Entity\Filter;
use Kwarcek\FurgonetkaRestApi\Entity\Location;
use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\Traits\ResponseTrait;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;

/**
 * Class PointRequest
 * @package Kwarcek\FurgonetkaRestApi\Request
 */
class PointRequest extends Request
{
    use ResponseTrait;

    /** @var FurgonetkaClient $client */
    protected FurgonetkaClient $client;

    public function __construct(FurgonetkaClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param Location $location
     * @param Filter $filter
     *
     * @return array{
     *            code: integer,
     *            data: array{
     *              points: object[],
     *              coordinates: object,
     *              recentlySelectedPoints: object[],
     *             },
     *        }
     * @throws FurgonetkaApiException
     */
    public function getMapPoints(Location $location, Filter $filter): array
    {
        $response = $this->client->post(
            '/points/map', [
            'location' => $location->toArray(),
            'filters' => $filter->toArray(),
        ]);

        return $this->response($response);
    }
}