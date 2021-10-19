<?php

namespace Kwarcek\FurgonetkaRestApi\Test;

use Kwarcek\FurgonetkaRestApi\Entity\Regulation;
use Kwarcek\FurgonetkaRestApi\Request\RegulationRequest;

class AcceptCarrierRegulations extends TestCase
{
    private RegulationRequest $request;

    protected function setUp(): void
    {
        parent::setUp();
        $this->request = new RegulationRequest();
    }

    public function test_accept_carrier_regulations()
    {
        $regulations = $this->request->getRegulations()['data']['regulations'];
        $regulationsArray = [];

        foreach ($regulations as $regulation) {
            $regulation = $this->setRegulation($regulation);
            $regulationsArray[] = $regulation;
        }

        $response = $this->request->acceptCarrierRegulations($regulationsArray);

        $this->assertEquals(1, 1);
    }

    /**
     * @param array $regulation
     * @return Regulation
     */
    private function setRegulation(array $regulation): Regulation
    {
        $newRegulation = new Regulation();
        $newRegulation->service = $regulation['service'];
        $newRegulation->version = $regulation['version'];
        $newRegulation->datetime = $regulation['datetime'];
        $newRegulation->accepted = $regulation['accepted'];
        $newRegulation->name = $regulation['service'];

        return $newRegulation;
    }
}