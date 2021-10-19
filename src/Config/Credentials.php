<?php

namespace Kwarcek\FurgonetkaRestApi\Config;

/**
 * Class Credentials
 * @package Kwarcek\FurgonetkaRestApi\Config
 */
class Credentials
{
    private const CLIENT_ID = '';
    private const CLIENT_SECRET = '';
    private const USERNAME = '';
    private const PASSWORD = '';
    public const AUTH_URL = 'https://konto-test.furgonetka.pl/';
    public const API_URL = 'https://api-test.furgonetka.pl/';

    /**
     * @return array
     */
    public static function toArray(): array
    {
        return [
            'client_id' => self::CLIENT_ID,
            'client_secret' => self::CLIENT_SECRET,
            'username' => self::USERNAME,
            'password' => self::PASSWORD,
            'auth_url' => self::AUTH_URL,
            'api_url' => self::API_URL,
        ];
    }
}