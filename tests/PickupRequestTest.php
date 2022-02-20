<?php

namespace Kwarcek\FurgonetkaRestApi\Test;

use Kwarcek\FurgonetkaRestApi\Entity\PickupDate;
use Kwarcek\FurgonetkaRestApi\Request\PickupRequest;
use Kwarcek\FurgonetkaRestApi\Test\Helpers\RequestHelper;
use Ramsey\Uuid\Uuid;

/**
 * Class PickupRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class PickupRequestTest extends TestCase
{
    private PickupRequest $request;

    public function setUp(): void
    {
        parent::setUp();
        $this->request = $this->client->pickup();
    }

    public function test_pickup_request_order_courier_drive()
    {
        $helper = new RequestHelper($this->client);
        $packageId = $helper->addPackage()['data']['package_id'];

        $helper->orderShipments(Uuid::uuid4()->toString(), [(object)['id' => $packageId]]);

        sleep(2);

        $pickupDate = new PickupDate();
        $pickupDate->date = (new \DateTime())
            ->format('Y-m-d');

        $hoursProposition = $helper->getPickupHoursProposition(
            [(object)['id' => $packageId]],
            $pickupDate->date
        )['data']['packages'][0]['proposals'];

        $pickupDate->minTime = $hoursProposition[0]['min_time'];
        $pickupDate->maxTime = $hoursProposition[0]['max_time'];
        $pickupDate->date = $hoursProposition[0]['date'];

        $uuid = Uuid::uuid4()->toString();
        $response = $this->request->orderCourierDrive(
            $uuid,
            [(object)['id' => $packageId]],
            $pickupDate
        );

        $this->pickup_request_order_courier_drive_summary($uuid);

        $this->assertEquals($response['code'], 200);
        $this->assertGreaterThan(0, count($response['data']));
    }

    public function pickup_request_order_courier_drive_summary(string $uuid)
    {
        $response = $this->request->orderCourierDriveSummary($uuid);

        $this->assertEquals($response['code'], 200);
        $this->assertGreaterThan(0, count($response['data']));
    }
}
