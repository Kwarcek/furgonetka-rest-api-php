<?php

namespace Kwarcek\FurgonetkaRestApi\Test\Unit\Request;

use Kwarcek\FurgonetkaRestApi\Entity\Service;
use Kwarcek\FurgonetkaRestApi\Factory\AdditionalServiceFactory;
use Kwarcek\FurgonetkaRestApi\Factory\PackageFactory;
use Kwarcek\FurgonetkaRestApi\Factory\ParcelFactory;
use Kwarcek\FurgonetkaRestApi\Factory\PickupFactory;
use Kwarcek\FurgonetkaRestApi\Factory\ReceiverFactory;
use Kwarcek\FurgonetkaRestApi\Factory\SenderFactory;
use Kwarcek\FurgonetkaRestApi\Request\PackageRequest;
use Kwarcek\FurgonetkaRestApi\Test\TestCase;
use Ramsey\Uuid\Uuid;

/**
 * Class PackageRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class PackageRequestTest extends TestCase
{
    private PackageRequest $request;

    public function setUp(): void
    {
        parent::setUp();
        $this->request = new PackageRequest($this->client);
    }

    public function test_package_request_get_packages_list(): void
    {
        $response = $this->request->getPackagesList();

        $this->assertEquals(200, $response['code']);
        $this->assertArrayHasKey('packages', $response['data']);
    }

    public function test_package_request_add_package(): void
    {
        $response = $this->helper->addPackage();

        $this->assertEquals(200, $response['code']);
        $this->assertArrayHasKey('data', $response);
        $this->assertArrayHasKey('package_id', $response['data']);
    }

    public function test_package_request_validate_package(): void
    { // todo
        $packageObject = PackageFactory::getEntity();
        $packageResponse = $this->helper->addPackage();

        $response = $this->request->validatePackage(
            $packageObject->pickup,
            $packageObject->receiver,
            $packageObject->serviceId,
            $packageObject->parcels,
            $packageObject->sender,
            $packageObject->additionalServices,
            $packageObject->type,
            $packageObject->userReferenceNumber,
            $packageObject->payer
        );

        $this->assertEquals(204, $response['code']);
        $this->assertArrayHasKey('data', $response);
    }

    public function test_package_request_track_shipment(): void // todo
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];

        $response = $this->request->trackShipment($packageId);

        $this->assertEquals(200, $response['code']);
    }

    public function test_package_request_get_pickup_date_proposition(): void
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];
        $readyDate = (new \DateTime())
            ->modify('next monday')
            ->format('Y-m-d');

        $response = $this->request->getPickupDateProposition([
            (object) ['id' => $packageId]
        ], $readyDate);

        $this->assertEquals(200, $response['code']);
        $this->assertArrayHasKey('packages', $response['data']);
    }

    public function test_package_request_generate_protocol(): void
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];
        $this->helper->orderShipments(Uuid::uuid4()->toString(), [(object)['id' => $packageId]]);

        sleep(2);

        $response = $this->request->generateProtocol([
            (object) ['id' => $packageId]
        ]);

        $this->assertEquals(200, $response['code']);
        $this->assertEquals(null, $response['data']);
    }

    public function test_package_request_get_label(): void // todo
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];

        $response = $this->request->getLabel($packageId);

        $this->assertEquals(200, $response['code']);
    }

    public function test_package_request_get_package_details(): void
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];
        $response = $this->request->getPackageDetails($packageId);

        $this->assertEquals(200, $response['code']);
        $this->assertArrayHasKey('package_id', $response['data']);
    }

    public function test_package_request_delete_package(): void
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];
        $response = $this->request->deletePackage($packageId);

        $this->assertEquals(204, $response['code']);
        $this->assertEquals(null, $response['data']);
    }

    public function test_package_request_edit_package(): void // todo
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];
        $serviceId = 8800592;

        $response = $this->request->editPackage(
            $packageId,
            PickupFactory::getEntity(),
            ReceiverFactory::getEntity(),
            $serviceId,
            ParcelFactory::getEntity(),
            SenderFactory::getEntity(),
            AdditionalServiceFactory::getEntity()
        );

        $this->assertEquals(200, $response['code']);
    }

    public function test_package_request_calculate_package_price(): void
    {
        $package = PackageFactory::getEntity();
        $service = new Service();

        $service->service = [
            "dpd",
            "ups",
            "inpost",
            "inpostkurier",
            "gls",
            "fedex",
            "poczta",
            "dhl",
            "meest"
        ];

        $response = $this->request->calculatePackagePrice($package, $service);

        $this->assertEquals(200, $response['code']);
        $this->assertArrayHasKey('services_prices', $response['data']);
    }

    public function test_package_request_add_package_to_tracking(): void
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];

        $response = $this->request->addPackageToTracking($packageId);

        $this->assertEquals(200, $response['code']);
        $this->assertArrayHasKey('package_id', $response['data']);
    }

    public function test_package_request_delete_packages(): void
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];
        $response = $this->request->deletePackages([
            (object)['id' => $packageId]
        ]);

        $this->assertEquals(204, $response['code']);
        $this->assertEquals(null, $response['data']);
    }
}
