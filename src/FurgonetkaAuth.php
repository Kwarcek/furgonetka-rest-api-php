<?php

namespace Kwarcek\FurgonetkaRestApi;

use GuzzleHttp\Client;
use Exception;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class FurgonetkaAuth
 * @package Kwarcek\FurgonetkaRestApi
 */
class FurgonetkaAuth
{
    protected AuthCredential $authCredential;
    protected LoginCredential $loginCredentials;

    public function __construct(LoginCredential $loginCredentials)
    {
        $this->loginCredentials = $loginCredentials;
        $this->authCredential = $this->login();
    }

    /** @throws Exception */
    public function login(): AuthCredential
    {
        $basicAuth = base64_encode("{$this->loginCredentials->clientId}:{$this->loginCredentials->clientSecret}");

        $authClient = new Client([
            'base_uri' => $this->loginCredentials->authUrl,
            'timeout' => 8,
            'verify' => false,
        ]);

        $response = $this->getAuthToken($authClient, $basicAuth);

        if($response->getStatusCode() !== 200) {
            throw new Exception((string) $response->getBody());
        }

        $response = json_decode($response->getBody(), true);

        return AuthCredential::fromArray($response);
    }


    /** @throws GuzzleException */
    private function getAuthToken(ClientInterface $authClient, string $authorizationHeader): ResponseInterface
    {
        return $authClient->request('POST', '/oauth/token', [
            'headers' => [
                'Authorization' => "Basic {$authorizationHeader}",
            ],
            'form_params' => [
                'grant_type' => 'password',
                'scope' => 'api',
                'username' => $this->loginCredentials->username,
                'password' => $this->loginCredentials->password,
            ]
        ]);
    }
}
