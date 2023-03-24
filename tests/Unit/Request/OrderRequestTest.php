<?php

namespace Kwarcek\FurgonetkaRestApi\Test\Unit\Request;

use Kwarcek\FurgonetkaRestApi\Request\OrderRequest;
use Kwarcek\FurgonetkaRestApi\Test\TestCase;
use Ramsey\Uuid\Uuid;

/**
 * Class OrderRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class OrderRequestTest extends TestCase
{
    private OrderRequest $request;
    private string $uuid;

    public function setUp(): void
    {
        parent::setUp();
        $this->uuid = Uuid::uuid4()->toString();
        $this->request = new OrderRequest($this->client);
    }

    public function test_order_request_order_shipments()
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];
        $response = $this->request->orderShipments(
            $this->uuid, [
                (object) ['id' => $packageId]
            ]
        );
        $this->order_request_order_shipments_summary();

        $this->assertEquals(200, $response['code']);
        $this->assertCount(1, $response['data']);
        $this->assertArrayHasKey('uuid', $response['data']);
    }

    public function order_request_order_shipments_summary()
    {
        $response = $this->request->orderShipmentsSummary($this->uuid);

        $this->assertEquals(200, $response['code']);
        $this->assertGreaterThan(0, count($response['data']));
        $this->assertArrayHasKey('status', $response['data']);
    }
}
