<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Payment
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Payment extends Entity
{
    public string $errorReturnUrl = '';
    public string $blikWithoutCode = '';
    public string $blikCode = '';

    public function __construct(
        public float $amount,
        public int $channel,
        public string $returnUrl,
    )
    {

    }

    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'channel' => $this->channel,
            'return_url' => $this->returnUrl,
            'error_return_url' => $this->errorReturnUrl,
            'blik_without_code' => $this->blikWithoutCode,
            'blik_code' => $this->blikCode,
        ];
    }
}