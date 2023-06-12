<?php

namespace Kwarcek\FurgonetkaRestApi\Test\Unit\Request;

use Kwarcek\FurgonetkaRestApi\Entity\Payment;
use Kwarcek\FurgonetkaRestApi\Request\PaymentRequest;
use Kwarcek\FurgonetkaRestApi\Test\TestCase;

/**
 * Class PaymentRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class PaymentRequestTest extends TestCase
{
    protected PaymentRequest $request;

    public function setUp(): void
    {
        parent::setUp();
        $this->request = new PaymentRequest($this->client);
    }

    public function test_payment_request_add_payment(): void
    {
        $payment = new Payment(
            rand(10, 20),
            1,
            'https://github.com/Kwarcek/furgonetka-rest-api-php'
        );

        $response = $this->request->addPayment($payment);

        $this->assertEquals(200, $response['code']);
        $this->assertArrayHasKey('data', $response);
        $this->assertArrayHasKey('url', $response['data']);
    }

    public function test_payment_request_get_payment_channels(): void
    {
        $response = $this->request->getPaymentChannels();

        $this->assertEquals(200, $response['code']);
        $this->assertArrayHasKey('data', $response);
        $this->assertArrayHasKey('channels', $response['data']);
        $this->assertGreaterThan(0, count($response['data']['channels']));
    }
}
