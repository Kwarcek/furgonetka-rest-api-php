<?php

namespace Kwarcek\FurgonetkaRestApi;

/**
 * Class LoginCredential
 * @package Kwarcek\FurgonetkaRestApi
 */
class LoginCredential
{
    /** @var string $clientId */
    public string $clientId;

    /** @var string $clientSecret */
    public string $clientSecret;

    /** @var string $username */
    public string $username;

    /** @var string $password */
    public string $password;

    /** @var string $authUrl */
    public string $authUrl = 'https://konto-test.furgonetka.pl/';

    /** @var string $apiUrl */
    public string $apiUrl = 'https://api-test.furgonetka.pl/';

    public function toArray(): array
    {
        return [
          'client_id' => $this->clientId,
          'client_secret' => $this->clientSecret,
          'username' => $this->username,
          'password' => $this->password,
          'auth_url' => $this->authUrl,
          'api_url' => $this->apiUrl,
        ];
    }
}