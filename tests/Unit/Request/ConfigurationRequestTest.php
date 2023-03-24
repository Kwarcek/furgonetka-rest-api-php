<?php

namespace Kwarcek\FurgonetkaRestApi\Test\Unit\Request;

use Kwarcek\FurgonetkaRestApi\Request\ConfigurationRequest;
use Kwarcek\FurgonetkaRestApi\Test\TestCase;

/**
 * Class ConfigurationRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class ConfigurationRequestTest extends TestCase
{
    private ConfigurationRequest $request;

    public function setUp(): void
    {
        parent::setUp();
        $this->request = new ConfigurationRequest($this->client);
    }

    public function test_configuration_request_get_allowed_countries()
    {
        $response = $this->request->getAllowedCountries();

        $this->assertEquals(200, $response['code']);
        $this->assertArrayHasKey('shipment', $response['data']);
        $this->assertGreaterThan(0, count($response['data']['shipment']));
    }

    public function test_configuration_request_get_carriers_statements()
    {
        $response = $this->request->getCarriersStatements();

        $this->assertEquals(200, $response['code']);
        $this->assertArrayHasKey('servicesStatements', $response['data']);
        $this->assertGreaterThan(0, count($response['data']['servicesStatements']));
    }
}
