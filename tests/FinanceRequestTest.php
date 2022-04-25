<?php

namespace Kwarcek\FurgonetkaRestApi\Test;

use Kwarcek\FurgonetkaRestApi\Request\FinanceRequest;

/**
 * Class FinanceRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class FinanceRequestTest extends TestCase
{
    private FinanceRequest $request;

    public function setUp(): void
    {
        parent::setUp();
        $this->request = new FinanceRequest($this->client);
    }

    public function test_finance_get_list_of_transfers()
    {
        $response = $this->request->getListOfTransfers();

        $this->assertEquals($response['code'], 200);
        $this->assertArrayHasKey('transfers', $response['data']);
    }
}
