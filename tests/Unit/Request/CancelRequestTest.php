<?php

namespace Kwarcek\FurgonetkaRestApi\Test\Unit\Request;

use Kwarcek\FurgonetkaRestApi\Request\CancelRequest;
use Kwarcek\FurgonetkaRestApi\Test\TestCase;
use Ramsey\Uuid\Uuid;

/**
 * Class CancelRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class CancelRequestTest extends TestCase
{
    private CancelRequest $request;
    private string $uuid;

    public function setUp(): void
    {
        parent::setUp();
        $this->uuid = Uuid::uuid4()->toString();
        $this->request = new CancelRequest($this->client);
    }

    public function test_cancel_request_cancel_packages(): void
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];

        $response = $this->request->cancelPackages(
            $this->uuid, [
                (object) ['id' => $packageId]
            ]
        );

        $this->cancel_request_cancel_packages_summary();

        $this->assertEquals(200, $response['code']);
        $this->assertCount(1, $response['data']);
        $this->assertArrayHasKey('uuid', $response['data']);
    }

    public function cancel_request_cancel_packages_summary(): void
    {
        $response = $this->request->cancelPackagesSummary(
            $this->uuid,
        );

        $this->assertEquals(200, $response['code']);
        $this->assertGreaterThanOrEqual(1, count($response['data']));
        $this->assertArrayHasKey('status', $response['data']);
    }
}
