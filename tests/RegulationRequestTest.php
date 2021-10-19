<?php

namespace Kwarcek\FurgonetkaRestApi\Test;

use Kwarcek\FurgonetkaRestApi\Entity\Regulation;
use Kwarcek\FurgonetkaRestApi\Request\RegulationRequest;

class RegulationRequestTest extends TestCase
{
    const REGULATION_NAME = 'Regulamin DPD';

    private RegulationRequest $request;

    protected function setUp(): void
    {
        parent::setUp();
        $this->request = new RegulationRequest();
    }

    public function test_regulation_request_get_regulations()
    {
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
        $regulation = new Regulation();
        $regulation->service = $dpd['service'];
        $regulation->version = $dpd['version'];
        $regulation->datetime = $dpd['datetime'];
        $regulation->accepted = $dpd['accepted'];
        $regulation->name = self::REGULATION_NAME;

        $response = $this->request->acceptCarrierRegulations([
            $regulation
        ]);

        $this->assertEquals($response['code'], 200);
        $this->assertGreaterThan(0, count($response['data']));
    }
}
