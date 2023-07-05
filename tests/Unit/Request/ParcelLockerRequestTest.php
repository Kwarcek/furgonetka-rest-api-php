<?php

namespace Kwarcek\FurgonetkaRestApi\Test\Unit\Request;

use Kwarcek\FurgonetkaRestApi\Entity\ParcelLocker\ParcelLockerData;
use Kwarcek\FurgonetkaRestApi\Entity\ParcelLocker\UserAgreement;
use Kwarcek\FurgonetkaRestApi\Entity\ParcelLocker\UserData;
use Kwarcek\FurgonetkaRestApi\Request\ParcelLockerRequest;
use Kwarcek\FurgonetkaRestApi\Test\TestCase;

/**
 * Class ParcelLockerRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class ParcelLockerRequestTest extends TestCase
{
    protected ParcelLockerRequest $request;

    public function setUp(): void
    {
        parent::setUp();
        $this->request = new ParcelLockerRequest($this->client);
    }

    public function test_parcel_locker_request_apply(): void // todo
    {
        $userData = new UserData(
            $this->faker->name,
            $this->faker->lastName,
            $this->faker->email,
            $this->faker->phoneNumber
        );
        $parcelLockerData = new ParcelLockerData(
            $this->faker->streetName,
            $this->faker->postcode,
            $this->faker->city,
            'small'
        );
        $files = [''];
        $userAgreements = new UserAgreement(
            true,
            true
        );

        $response = $this->request->apply(
            $userData,
            $parcelLockerData,
            $files,
            $userAgreements
        );

        $this->assertEquals(200, $response['code']);
        $this->assertArrayHasKey('data', $response);
        $this->assertArrayHasKey('url', $response['data']);
    }
}
