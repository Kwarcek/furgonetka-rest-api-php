<?php

namespace Kwarcek\FurgonetkaRestApi\Test;

use Kwarcek\FurgonetkaRestApi\Entity\Service;
use Kwarcek\FurgonetkaRestApi\Request\PackageRequest;
use Ramsey\Uuid\Uuid;

/**
 * Class PackageRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class PackageRequestTest extends TestCase
{
    /** @var PackageRequest $request */
    private PackageRequest $request;

    public function setUp(): void
    {
        parent::setUp();
        $this->request = $this->client->package();
    }

    public function test_package_request_get_packages_list()
    {
        $response = $this->request->getPackagesList();

        $this->assertEquals(200, $response['code']);
        $this->assertArrayHasKey('packages', $response['data']);
    }

    public function test_package_request_add_package()
    {
        $response = $this->helper->addPackage();

        $this->assertEquals($response['code'], 200);
        $this->assertArrayHasKey('data', $response);
        $this->assertArrayHasKey('package_id', $response['data']);
    }

    public function test_package_request_validate_package()
    {
        $package = $this->helper->getPackage();

        $response = $this->request->validatePackage(
            $package->pickup,
            $package->receiver,
            $package->serviceId,
            $package->parcels,
            $package->sender,
            $package->additionalServices,
            $package->type,
            $package->userReferenceNumber,
            $package->payer
        );

        $this->assertEquals($response['code'], 204);
        $this->assertArrayHasKey('data', $response);
    }

    public function test_package_request_track_shipment() // todo
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];

        $response = $this->request->trackShipment($packageId);

        $this->assertEquals($response['code'], 200);
    }

    public function test_package_request_get_pickup_date_proposition()
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];
        $readyDate = (new \DateTime())
            ->modify('next monday')
            ->format('Y-m-d');

        $response = $this->request->getPickupDateProposition([
            (object) ['id' => $packageId]
        ], $readyDate);

        $this->assertEquals($response['code'], 200);
        $this->assertArrayHasKey('packages', $response['data']);
    }

    public function test_package_request_generate_protocol()
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];
        $this->helper->orderShipments(Uuid::uuid4()->toString(), [(object)['id' => $packageId]]);

        sleep(2);

        $response = $this->request->generateProtocol([
            (object) ['id' => $packageId]
        ]);

        $this->assertEquals($response['code'], 200);
        $this->assertEquals(null, $response['data']);
    }

    public function test_package_request_get_label() // todo
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];

        $response = $this->request->getLabel($packageId);

        $this->assertEquals($response['code'], 200);
    }

    public function test_package_request_get_package_details()
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];
        $response = $this->request->getPackageDetails($packageId);

        $this->assertEquals($response['code'], 200);
        $this->assertArrayHasKey('package_id', $response['data']);
    }

    public function test_package_request_delete_package()
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];
        $response = $this->request->deletePackage($packageId);

        $this->assertEquals($response['code'], 204);
        $this->assertEquals($response['data'], null);
    }

    public function test_package_request_edit_package() // todo
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];
        $serviceId = '8800592';

        $response = $this->request->editPackage(
            $packageId,
            $this->helper->getPickup(),
            $this->helper->getReceiver(),
            $serviceId,
            $this->helper->getParcel(),
            $this->helper->getSender(),
            $this->helper->getAdditionalServices()
        );

        $this->assertEquals($response['code'], 200);
    }

    public function test_package_request_calculate_package_price()
    {
        $package = $this->helper->getPackage();
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

        $this->assertEquals($response['code'], 200);
        $this->assertArrayHasKey('services_prices', $response['data']);
    }

    public function test_package_request_add_package_to_tracking()
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];

        $response = $this->request->addPackageToTracking($packageId);

        $this->assertEquals($response['code'], 200);
        $this->assertArrayHasKey('package_id', $response['data']);
    }

    public function test_package_request_delete_packages()
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];
        $response = $this->request->deletePackages([(object)['id' => $packageId]]);

        $this->assertEquals($response['code'], 204);
        $this->assertEquals($response['data'], null);
    }
}
