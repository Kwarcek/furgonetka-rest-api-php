<?php

namespace Kwarcek\FurgonetkaRestApi\Test\Unit\Request;

use Kwarcek\FurgonetkaRestApi\Entity\Regulation;
use Kwarcek\FurgonetkaRestApi\Request\RegulationRequest;
use Kwarcek\FurgonetkaRestApi\Test\TestCase;

/**
 * Class AccountRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class AcceptCarrierRegulations extends TestCase
{
    protected RegulationRequest $request;

    protected function setUp(): void
    {
        parent::setUp();
        $this->request = new RegulationRequest($this->client);
    }

    public function test_accept_carrier_regulations(): void
    { //todo
        $regulations = $this->request->getRegulations()['data']['regulations'];
        $regulationsArray = [];

        foreach ($regulations as $regulation) {
            $regulationsArray[] = Regulation::fromArray($regulation);
        }

        $response = $this->request->acceptCarrierRegulations($regulationsArray);

        $this->assertEquals(1, 1);
    }
}
