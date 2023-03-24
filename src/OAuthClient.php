<?php

namespace Kwarcek\FurgonetkaRestApi;

use GuzzleHttp\ClientInterface;

class OAuthClient
{
    public function __construct(private ClientInterface $client)
    {
    }

    public function authorize(string $clientId, string $redirectUri, ?string $state = null, string $scope = 'api')
    {
        return $this->client->request('GET', '/oauth/authorize', [
            'headers' => [
//                'Authorization' => "Basic ",
            ],
            'form_params' => [
                'response_type' => 'code',
                'client_id' => $clientId,
                'redirect_uri' => $redirectUri,
                'state' => $state,
                'scope' => $scope,
            ]
        ]);
    }
    public function getToken(string $clientId, string $clientSecret)
    {
        $basicAuth = base64_encode("{$clientId}:{$clientSecret}");

        return $this->client->request('POST', '/oauth/token', [
            'headers' => [
                'Authorization' => "Basic ".$basicAuth,
            ],
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => 'code',
                'redirect_uri' => 'redirect_uri',
            ]
        ]);
    }

    public function refreshToken()
    {
        return $this->client->request('POST', '/oauth/token', [
            'headers' => [
                'Authorization' => "Basic ",
            ],
            'form_params' => [
                'grant_type' => 'password',
                'scope' => 'api',
                'username' => '',
                'password' => '',
            ]
        ]);
    }

    public function getTokenByPassword()
    {
        return $this->client->request('POST', '/oauth/token', [
            'headers' => [
                'Authorization' => "Basic ",
            ],
            'form_params' => [
                'grant_type' => 'password',
                'scope' => 'api',
                'username' => '',
                'password' => '',
            ]
        ]);
    }

    public function credentialsAuthorize()
    {
        return $this->client->request('POST', '/oauth/token', [
            'headers' => [
                'Authorization' => "Basic ",
            ],
            'form_params' => [
                'grant_type' => 'password',
                'scope' => 'api',
                'username' => '',
                'password' => '',
            ]
        ]);
    }
}