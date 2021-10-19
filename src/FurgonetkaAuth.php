<?php

namespace Kwarcek\FurgonetkaRestApi;

use GuzzleHttp\Client;
use Exception;

/**
 * Class FurgonetkaAuth
 * @package Kwarcek\FurgonetkaRestApi
 */
class FurgonetkaAuth
{
    protected string $clientId;
    protected string $clientSecret;
    protected string $username;
    protected string $password;
    private string $authUrl;

    /**
     * FurgonetkaAuth constructor.
     * @param string $clientId
     * @param string $clientSecret
     * @param string $username
     * @param string $password
     * @param string $authUrl
     */
    public function __construct(
        string $clientId,
        string $clientSecret,
        string $username,
        string $password,
        string $authUrl
    ) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->username = $username;
        $this->password = $password;
        $this->authUrl = $authUrl;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function login(): array
    {
        $basicAuth = base64_encode("{$this->clientId}:{$this->clientSecret}");

        $authClient = new Client([
            'base_uri' => $this->authUrl,
            'timeout' => 8,
            'verify' => false,
        ]);

        $response = $authClient->post('/oauth/token', [
            'headers' => [
                'Authorization' => "Basic {$basicAuth}",
            ],
            'form_params' => [
                'grant_type' => 'password',
                'scope' => 'api',
                'username' => $this->username,
                'password' => $this->password,
            ]
        ]);

        if($response->getStatusCode() !== 200) {
            throw new Exception((string) $response->getBody());
        }

        $response = json_decode($response->getBody(), true);

        return [
            'access_token' => $response['access_token'],
            'token_type' => $response['token_type'],
            'expires_in' => $response['expires_in'],
            'refresh_token' => $response['refresh_token'],
        ];
    }
}
