<?php

namespace Kwarcek\FurgonetkaRestApi;

/**
 * Class AuthCredential
 * @package Kwarcek\FurgonetkaRestApi
 */
class AuthCredential
{
    /** @var string $accessToken */
    public string $accessToken;

    /** @var string $tokenType */
    public string $tokenType;

    /** @var string $expiresIn */
    public string $expiresIn;

    /** @var string $refreshToken */
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
}