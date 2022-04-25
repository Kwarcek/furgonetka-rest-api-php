<?php

namespace Kwarcek\FurgonetkaRestApi;

use Exception;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;
use Kwarcek\FurgonetkaRestApi\Traits\RequestTrait;
use Psr\Http\Message\ResponseInterface;

/**
 * Class FurgonetkaClient
 * @package Kwarcek\FurgonetkaRestApi
 */
class FurgonetkaClient extends FurgonetkaAuth
{
    use RequestTrait;

    private ClientInterface $apiClient;

    public function __construct(
        ClientInterface $apiClient,
        LoginCredential $loginCredentials
    )
    {
        parent::__construct($loginCredentials);
        $this->apiClient = $apiClient;
    }

    /** @throws FurgonetkaApiException */
    public function get(string $uri, array $data = []): ResponseInterface
    {
        try {
            return $this->getClient()->request('GET', $uri, [
                'json' => $data,
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->authCredential->accessToken,
                ],
            ]);
        } catch (GuzzleException $exception) {
            throw new FurgonetkaApiException(
                $exception->getResponse()->getBody()->getContents(),
                $exception->getResponse()->getStatusCode(),
            );
        }
    }

    public function post(string $uri, array $data = []): ResponseInterface
    {
        try {
            return $this->getClient()->request('POST', $uri, [
                'json' => $data,
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->authCredential->accessToken,
                ],
            ]);
        } catch (GuzzleException $exception) {
            throw new FurgonetkaApiException(
                $exception->getResponse()->getBody()->getContents(),
                $exception->getResponse()->getStatusCode(),
            );
        }
    }

    /** @throws FurgonetkaApiException */
    public function delete(string $uri, array $data = []): ResponseInterface
    {
        try {
            return $this->getClient()->request('DELETE', $uri, [
                'json' => $data,
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->authCredential->accessToken,
                ],
            ]);
        } catch (GuzzleException $exception) {
            throw new FurgonetkaApiException(
                $exception->getResponse()->getBody()->getContents(),
                $exception->getResponse()->getStatusCode(),
            );
        }
    }

    /** @throws FurgonetkaApiException */
    public function put(string $uri, array $data = []): ResponseInterface
    {
        try {
            return $this->getClient()->request('PUT', $uri, [
                'json' => $data,
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->authCredential->accessToken,
                ],
            ]);
        } catch (GuzzleException $exception) {
            throw new FurgonetkaApiException(
                $exception->getResponse()->getBody()->getContents(),
                $exception->getResponse()->getStatusCode(),
            );
        }
    }

    /** @throws Exception */
    public function getClient(): ClientInterface
    {
        return $this->apiClient;
    }
}