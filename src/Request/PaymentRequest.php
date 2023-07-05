<?php

namespace Kwarcek\FurgonetkaRestApi\Request;

use Kwarcek\FurgonetkaRestApi\Entity\Payment;
use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\Traits\ResponseTrait;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;

/**
 * Class PaymentRequest
 * @package Kwarcek\FurgonetkaRestApi\Request
 */
class PaymentRequest extends Request
{
    use ResponseTrait;

    protected FurgonetkaClient $client;

    public function __construct(FurgonetkaClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param Payment $payment
     * @return array{
     *            code: int,
     *            data: array{
     *              url: string,
     *             },
     *        }
     * @throws FurgonetkaApiException
     */
    public function addPayment(Payment $payment): array
    {
        $response = $this->client->put('payments/create', $payment->toArray());

        return $this->response($response);
    }

    /**
     * @return array{
     *            code: int,
     *            data: array{
     *              last_chosen_payment_channel_id: int,
     *              blik_without_code: bool,
     *              channels: object[],
     *             },
     *        }
     * @throws FurgonetkaApiException
     */
    public function getPaymentChannels(): array
    {
        $response = $this->client->get('payments/channels');

        return $this->response($response);
    }
}