<?php

namespace Kwarcek\FurgonetkaRestApi\Test;

use Kwarcek\FurgonetkaRestApi\Request\CancelRequest;
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
        $this->request = $this->client->cancel();
    }

    public function test_cancel_request_cancel_packages()
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];

        $response = $this->request->cancelPackages(
            $this->uuid,
            [(object) ['id' => $packageId]]
        );

        $this->cancel_request_cancel_packages_summary();

        $this->assertEquals($response['code'], 200);
        $this->assertEquals(1, count($response['data']));
        $this->assertArrayHasKey('uuid', $response['data']);
    }

    public function cancel_request_cancel_packages_summary()
    {
        $response = $this->request->cancelPackagesSummary(
            $this->uuid,
        );

        $this->assertEquals($response['code'], 200);
        $this->assertGreaterThanOrEqual(1, count($response['data']));
        $this->assertArrayHasKey('status', $response['data']);
    }
}
