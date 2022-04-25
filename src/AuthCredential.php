<?php

namespace Kwarcek\FurgonetkaRestApi;

/**
 * Class AuthCredential
 * @package Kwarcek\FurgonetkaRestApi
 */
class AuthCredential
{
    public string $accessToken;
    public string $tokenType;
    public string $expiresIn;
    public string $refreshToken;

    public function toArray(): array
    {
        return [
          'access_token' => $this->accessToken,
          'token_type' => $this->tokenType,
          'expires_in' => $this->expiresIn,
          'refresh_token' => $this->refreshToken,
        ];
    }

    public static function fromArray(array $data): AuthCredential
    {
        $authCredential = new AuthCredential();
        $authCredential->accessToken = $data['access_token'];
        $authCredential->tokenType = $data['token_type'];
        $authCredential->expiresIn = $data['expires_in'];
        $authCredential->refreshToken = $data['refresh_token'];

        return $authCredential;
    }
}