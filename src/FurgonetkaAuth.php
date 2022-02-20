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
    protected ?AuthCredential $authCredential = null;

    /** @throws Exception */
    public function login(): AuthCredential
    {
        if($this->authCredential !== null) {
            return $this->authCredential;
        }

        $basicAuth = base64_encode("{$this->loginCredentials->clientId}:{$this->loginCredentials->clientSecret}");

        $authClient = new Client([
            'base_uri' => $this->loginCredentials->authUrl,
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
                'username' => $this->loginCredentials->username,
                'password' => $this->loginCredentials->password,
            ]
        ]);

        if($response->getStatusCode() !== 200) {
            throw new Exception((string) $response->getBody());
        }

        $response = json_decode($response->getBody(), true);

        $this->authCredential = new AuthCredential();
        $this->authCredential->accessToken = $response['access_token'];
        $this->authCredential->tokenType = $response['token_type'];
        $this->authCredential->expiresIn = $response['expires_in'];
        $this->authCredential->refreshToken = $response['refresh_token'];

        return $this->authCredential;
    }
}
