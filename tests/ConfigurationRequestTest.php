<?php

namespace Kwarcek\FurgonetkaRestApi\Test;

use Kwarcek\FurgonetkaRestApi\Request\ConfigurationRequest;

/**
 * Class ConfigurationRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class ConfigurationRequestTest extends TestCase
{
    /** @var ConfigurationRequest $request */
    private ConfigurationRequest $request;

    public function setUp(): void
    {
        parent::setUp();
        $this->request = $this->client->configuration();
    }

    public function test_configuration_request_get_allowed_countries()
    {
        $response = $this->request->getAllowedCountries();

        $this->assertEquals($response['code'], 200);
        $this->assertArrayHasKey('shipment', $response['data']);
        $this->assertGreaterThan(0, count($response['data']['shipment']));
    }

    public function test_configuration_request_get_carriers_statements()
    {
        $response = $this->request->getCarriersStatements();

        $this->assertEquals($response['code'], 200);
        $this->assertArrayHasKey('servicesStatements', $response['data']);
        $this->assertGreaterThan(0, count($response['data']['servicesStatements']));
    }
}
