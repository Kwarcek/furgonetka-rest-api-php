<?php

namespace Kwarcek\FurgonetkaRestApi\Test;

use Kwarcek\FurgonetkaRestApi\Entity\Address;
use Kwarcek\FurgonetkaRestApi\Entity\Coordinate;
use Kwarcek\FurgonetkaRestApi\Entity\Filter;
use Kwarcek\FurgonetkaRestApi\Entity\Location;
use Kwarcek\FurgonetkaRestApi\Entity\MapBound;
use Kwarcek\FurgonetkaRestApi\Request\PointRequest;

/**
 * Class PointRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class PointRequestTest extends TestCase
{
    /** @var PointRequest $request */
    private PointRequest $request;

    public function setUp(): void
    {
        parent::setUp();
        $this->request = $this->client->point();
    }

    public function test_point_request_get_map_points()
    {
        $coordinate = new Coordinate();
        $coordinate->latitude = 52.2217652; // Warsaw
        $coordinate->longitude = 20.9549011; // Warsaw

        $location = new Location();
        $location->coordinate = $coordinate;
        $location->searchPhrase = '';
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

        $this->assertEquals($response['code'], 200);
        $this->assertGreaterThan(0, count($response['data']));
    }
}
