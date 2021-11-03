<?php

namespace Kwarcek\FurgonetkaRestApi;

use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;
use GuzzleHttp\Client;
use Kwarcek\FurgonetkaRestApi\Traits\RequestTrait;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\ClientException;

/**
 * Class FurgonetkaClient
 * @package Kwarcek\FurgonetkaRestApi
 */
class FurgonetkaClient extends FurgonetkaAuth
{
    use RequestTrait;

    /** @var Client|null $apiClient */
    private ?Client $apiClient = null;

    /** @var LoginCredential $loginCredentials */
    protected LoginCredential $loginCredentials;

    public function __construct(LoginCredential $loginCredentials)
    {
        $this->loginCredentials = $loginCredentials;
    }

    /**
     * @return Client
     * @throws \Exception
     */
    public function getClient(): Client
    {
        if ($this->apiClient !== null) {
            return $this->apiClient;
        }

        $this->login();

        return $this->apiClient = new Client([
            'verify' => false,
            'base_uri' => $this->loginCredentials->apiUrl,
            'timeout' => 8,
            'headers' => [
                'Authorization' => "Bearer {$this->authCredential->accessToken}",
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);
    }

    /**
     * @param string $uri
     * @param array $data
     * @return ResponseInterface
     * @throws FurgonetkaApiException
     */
    public function get(string $uri, array $data = []): ResponseInterface
    {
        try {
            return $this->getClient()->get($uri, [
                'json' => $data,
            ]);
        } catch (ClientException $exception) {
            throw new FurgonetkaApiException(
                $exception->getResponse()->getBody()->getContents(),
                $exception->getResponse()->getStatusCode(),
            );
        }
    }

    /**
     * @param string $uri
     * @param array $data
     * @return ResponseInterface
     * @throws FurgonetkaApiException
     */
    public function post(string $uri, array $data = []): ResponseInterface
    {
        try {
            return $this->getClient()->post($uri, [
                'json' => $data,
            ]);
        } catch (ClientException $exception) {
            throw new FurgonetkaApiException(
                $exception->getResponse()->getBody()->getContents(),
                $exception->getResponse()->getStatusCode(),
            );
        }
    }

    /**
     * @param string $uri
     * @param array $data
     * @return ResponseInterface
     * @throws FurgonetkaApiException
     */
    public function delete(string $uri, array $data = []): ResponseInterface
    {
        try {
            return $this->getClient()->delete($uri, [
                'json' => $data
            ]);
        } catch (ClientException $exception) {
            throw new FurgonetkaApiException(
                $exception->getResponse()->getBody()->getContents(),
                $exception->getResponse()->getStatusCode(),
            );
        }
    }

    /**
     * @param string $uri
     * @param array $data
     * @return ResponseInterface
     * @throws FurgonetkaApiException
     */
    public function put(string $uri, array $data = []): ResponseInterface
    {
        try {
            return $this->getClient()->put($uri, [
                'json' => $data,
            ]);
        } catch (ClientException $exception) {
            throw new FurgonetkaApiException(
                $exception->getResponse()->getBody()->getContents(),
                $exception->getResponse()->getStatusCode(),
            );
        }
    }
}