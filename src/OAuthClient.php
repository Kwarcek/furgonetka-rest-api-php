<?php

namespace Kwarcek\FurgonetkaRestApi;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaAuthException;

class OAuthClient
{
    public function __construct(private ClientInterface $client)
    {
    }

    public function authorize(string $clientId, string $redirectUri, ?string $state = null, string $scope = 'api'): AuthCredential
    { // todo
        try {
            $response = $this->client->request('GET', '/oauth/authorize', [
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

            if($response->getStatusCode() !== 200) {
                throw new \Exception((string) $response->getBody());
            }

            $response = json_decode($response->getBody(), true);

            return AuthCredential::fromArray($response);
        } catch (GuzzleException $exception) {
            throw new FurgonetkaAuthException(
                $exception->getResponse()->getBody()->getContents(),
                $exception->getResponse()->getStatusCode(),
            );
        }
    }
    public function getToken(string $clientId, string $clientSecret)
    { // todo
        $basicAuth = base64_encode("{$clientId}:{$clientSecret}");

        return $this->client->request('POST', '/oauth/token', [
            'headers' => [
                'Authorization' => 'Basic ' .$basicAuth,
            ],
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => 'code',
                'redirect_uri' => 'redirect_uri',
            ]
        ]);
    }

    public function refreshToken()
    { // todo
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
    { // todo
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
    { // todo
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