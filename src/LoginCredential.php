<?php

namespace Kwarcek\FurgonetkaRestApi;

/**
 * Class LoginCredential
 * @package Kwarcek\FurgonetkaRestApi
 */
class LoginCredential
{
    const FURGONETKA_DEFAULT_TEST_LOGIN_API_URL = 'https://konto-test.furgonetka.pl/';
    const FURGONETKA_DEFAULT_TEST_API_URL = 'https://api-test.furgonetka.pl/';

    public string $clientId;
    public string $clientSecret;
    public string $username;
    public string $password;
    public string $authUrl = self::FURGONETKA_DEFAULT_TEST_LOGIN_API_URL;
    public string $apiUrl = self::FURGONETKA_DEFAULT_TEST_API_URL;

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