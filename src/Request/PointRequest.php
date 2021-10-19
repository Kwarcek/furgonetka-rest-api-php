<?php

namespace Kwarcek\FurgonetkaRestApi\Request;

use Kwarcek\FurgonetkaRestApi\Entity\Filter;
use Kwarcek\FurgonetkaRestApi\Entity\Location;
use Kwarcek\FurgonetkaRestApi\Traits\ResponseTrait;

/**
 * Class PointRequest
 * @package Kwarcek\FurgonetkaRestApi\Request
 */
class PointRequest extends Request
{
    use ResponseTrait;

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