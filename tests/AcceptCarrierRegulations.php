<?php

namespace Kwarcek\FurgonetkaRestApi\Test;

use Kwarcek\FurgonetkaRestApi\Entity\Regulation;
use Kwarcek\FurgonetkaRestApi\Request\RegulationRequest;

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

    public function test_accept_carrier_regulations()
    { //todo
        $regulations = $this->request->getRegulations()['data']['regulations'];
        $regulationsArray = [];

        foreach ($regulations as $regulation) {
            $regulationObj = (new Regulation())->fromArray($regulation);
            $regulationsArray[] = $regulationObj;
        }

        $response = $this->request->acceptCarrierRegulations($regulationsArray);

        $this->assertEquals(1, 1);
    }
}
