<?php

namespace Kwarcek\FurgonetkaRestApi\Traits;

use Psr\Http\Message\ResponseInterface;

/**
 * Trait ResponseTrait
 * @package Kwarcek\FurgonetkaRestApi\Traits
 */
trait ResponseTrait
{
    /**
     * @param ResponseInterface $response
     * @return array
     */
    protected function response(ResponseInterface $response): array
    {
        return [
            'code' => $response->getStatusCode(),
            'data' => json_decode($response->getBody()->getContents(), true)
        ];
    }
}