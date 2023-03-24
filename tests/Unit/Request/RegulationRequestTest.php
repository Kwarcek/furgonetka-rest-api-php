<?php

namespace Kwarcek\FurgonetkaRestApi\Test\Unit\Request;

use Kwarcek\FurgonetkaRestApi\Entity\Regulation;
use Kwarcek\FurgonetkaRestApi\Request\RegulationRequest;
use Kwarcek\FurgonetkaRestApi\Test\TestCase;

/**
 * Class RegulationRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class RegulationRequestTest extends TestCase
{
    const REGULATION_NAME = 'Regulamin DPD';

    private RegulationRequest $request;

    protected function setUp(): void
    {
        parent::setUp();
        $this->request = new RegulationRequest($this->client);
    }

    public function test_regulation_request_get_regulations(): void
    { // todo
        $response = $this->request->getRegulations();
        $regulations = $response['data']['regulations'];

        if($key = array_search(TestCase::DEFAULT_CARRIER, array_column($regulations, 'service')) !== null) {
            $this->regulation_request_accept_carrier_regulations($regulations[$key]);
        }

        $this->assertEquals($response['code'], 200);
        $this->assertGreaterThan(0, count($response['data']));
    }

    public function regulation_request_accept_carrier_regulations(array $dpd)
    {
        $dpd['name'] = self::REGULATION_NAME;
        $regulation = Regulation::fromArray($dpd);

        $response = $this->request->acceptCarrierRegulations([
            $regulation
        ]);

        $this->assertEquals(200, $response['code']);
        $this->assertGreaterThan(0, count($response['data']));
    }
}
