<?php

namespace Kwarcek\FurgonetkaRestApi\Test;

use Kwarcek\FurgonetkaRestApi\Request\OrderRequest;
use Ramsey\Uuid\Uuid;

/**
 * Class OrderRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class OrderRequestTest extends TestCase
{
    /** @var OrderRequest $request */
    private OrderRequest $request;

    /** @var string $uuid */
    private string $uuid;

    public function setUp(): void
    {
        parent::setUp();
        $this->uuid = Uuid::uuid4()->toString();
        $this->request = new OrderRequest();
    }

    public function test_order_request_order_shipments()
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];
        $response = $this->request->orderShipments($this->uuid, [(object) ['id' => $packageId]]);
        $this->order_request_order_shipments_summary();

        $this->assertEquals($response['code'], 200);
        $this->assertEquals(1, count($response['data']));
        $this->assertArrayHasKey('uuid', $response['data']);
    }

    public function order_request_order_shipments_summary()
    {
        $response = $this->request->orderShipmentsSummary($this->uuid);

        $this->assertEquals($response['code'], 200);
        $this->assertGreaterThan(0, count($response['data']));
        $this->assertArrayHasKey('status', $response['data']);
    }
}
