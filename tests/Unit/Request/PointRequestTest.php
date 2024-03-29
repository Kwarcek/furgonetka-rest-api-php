<?php

namespace Kwarcek\FurgonetkaRestApi\Test\Unit\Request;

use Kwarcek\FurgonetkaRestApi\Entity\Address;
use Kwarcek\FurgonetkaRestApi\Entity\Coordinate;
use Kwarcek\FurgonetkaRestApi\Entity\Filter;
use Kwarcek\FurgonetkaRestApi\Entity\Location;
use Kwarcek\FurgonetkaRestApi\Entity\MapBound;
use Kwarcek\FurgonetkaRestApi\Request\PointRequest;
use Kwarcek\FurgonetkaRestApi\Test\TestCase;

/**
 * Class PointRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class PointRequestTest extends TestCase
{
    private PointRequest $request;

    public function setUp(): void
    {
        parent::setUp();
        $this->request = new PointRequest($this->client);
    }

    public function test_point_request_get_map_points(): void
    {
        $coordinate = new Coordinate();
        $coordinate->latitude = 52.2217652; // Warsaw
        $coordinate->longitude = 20.9549011; // Warsaw

        $location = new Location();
        $location->coordinate = $coordinate;
        $location->address = new Address();
        $location->pointsMaxDistance = 15.00;

        $mapBound = new MapBound();
        $mapBound->northWest = clone $coordinate;
        $mapBound->northEast = clone $coordinate;
        $mapBound->southWest = clone $coordinate;
        $mapBound->southEast = clone $coordinate;

        $filter = new Filter();
        $filter->services = [
            "inpost",
            "ruch",
            "poczta",
            "ups",
            "dhl",
            "dpd",
            "meest",
            "fedex"
        ];
        $filter->pointTypes = [];
        $filter->mapBound = $mapBound;

        $response = $this->request->getMapPoints($location, $filter);

        $this->assertEquals(200, $response['code']);
        $this->assertEquals(0, count($response['data']['points']));
    }

    public function test_point_request_get_map_points_success(): void
    {
        $coordinate = new Coordinate();
        $coordinate->latitude = 52.2217652; // Warsaw
        $coordinate->longitude = 20.9549011; // Warsaw

        $location = new Location();
        $location->coordinate = $coordinate;
        $location->address = new Address();
        $location->pointsMaxDistance = 15.00;

        $mapBound = new MapBound();
        $mapBound->northWest = new Coordinate();
        $mapBound->northWest->latitude = 52.23;
        $mapBound->northWest->longitude = 20.98;

        $mapBound->northEast = new Coordinate();
        $mapBound->northEast->latitude = 52.23;
        $mapBound->northEast->longitude = 21.00;

        $mapBound->southWest = new Coordinate();
        $mapBound->southWest->latitude = 52.22;
        $mapBound->southWest->longitude = 20.98;

        $mapBound->southEast = new Coordinate();
        $mapBound->southEast->latitude = 52.23;
        $mapBound->southEast->longitude = 21.00;

        $filter = new Filter();
        $filter->services = [
            "inpost",
            "ruch",
            "poczta",
            "ups",
            "dhl",
            "dpd",
            "meest",
            "fedex"
        ];
        $filter->pointTypes = [];
        $filter->mapBound = $mapBound;

        $response = $this->request->getMapPoints($location, $filter);

        $this->assertEquals(200, $response['code']);
        $this->assertGreaterThan(0, count($response['data']['points']));
    }
}
