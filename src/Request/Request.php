<?php

namespace Kwarcek\FurgonetkaRestApi\Request;

use Kwarcek\FurgonetkaRestApi\Config\Credentials;
use Kwarcek\FurgonetkaRestApi\FurgonetkaAuth;
use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Psr\Http\Message\ResponseInterface;
use Exception;

/**
 * Class Request
 * @package Kwarcek\FurgonetkaRestApi\Request
 */
abstract class Request
{
    protected FurgonetkaClient $client;
    protected string $token;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->client = new FurgonetkaClient(
            Credentials::API_URL,
            $this->token = $this->getToken()
        );
    }
    /**
     * @param ResponseInterface $response
     * @return array
     */
    abstract protected function response(ResponseInterface $response): array;

    /**
     * @return string
     * @throws Exception
     */
    protected function getToken(): string
    {
        $credentials = Credentials::toArray();

        return (new FurgonetkaAuth(
            $credentials['client_id'],
            $credentials['client_secret'],
            $credentials['username'],
            $credentials['password'],
            $credentials['auth_url'],
        ))->login()['access_token'];
    }
}