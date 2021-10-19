<?php

namespace Kwarcek\FurgonetkaRestApi;

use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\ClientException;

/**
 * Class FurgonetkaClient
 * @package Kwarcek\FurgonetkaRestApi
 */
class FurgonetkaClient
{
    private string $apiUrl;
    private string $token;
    private ?Client $apiClient = null;

    /**
     * FurgonetkaClient constructor.
     * @param string $apiUrl
     * @param string $token
     */
    public function __construct(string $apiUrl, string $token)
    {
        $this->apiUrl = $apiUrl;
        $this->token = $token;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        if ($this->apiClient !== null) {
            return $this->apiClient;
        }

        $this->apiClient = new Client([
            'verify' => false,
            'base_uri' => $this->apiUrl,
            'timeout' => 8,
            'headers' => [
                'Authorization' => "Bearer {$this->token}",
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);

        return $this->apiClient;
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