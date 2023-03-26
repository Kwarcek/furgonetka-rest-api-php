<?php

namespace Kwarcek\FurgonetkaRestApi\Test\Unit;

use GuzzleHttp\Client;
use Kwarcek\FurgonetkaRestApi\AuthCredential;
use Kwarcek\FurgonetkaRestApi\LoginCredential;
use Kwarcek\FurgonetkaRestApi\Test\TestCase;
use Kwarcek\FurgonetkaRestApi\OAuthClient;

/**
 * Class OAuthClient
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class OAuthClientTest extends TestCase
{
    private OAuthClient $oauthClient;
    protected function setUp(): void
    {
        parent::setUp();
        $guzzleClient = new Client([
            'base_uri' => LoginCredential::FURGONETKA_DEFAULT_TEST_LOGIN_API_URL,
            'timeout' => 10,
            'verify' => false,
        ]);

        $this->oauthClient = new OAuthClient($guzzleClient);
    }

    public function test_oauth_client_authorize(): void // todo
    {
        $response = $this->oauthClient->authorize(
            getenv('FURGONETKA_CLIENT_ID'),
            ''
        );

        $this->assertInstanceOf(AuthCredential::class, $response);
    }

    public function test_oauth_client_get_token(): void // todo
    {
        $response = $this->oauthClient->getToken('', '');
    }

    public function test_oauth_client_refresh_token(): void // todo
    {
        $response = $this->oauthClient->refreshToken();
    }

    public function test_oauth_client_get_token_by_password(): void // todo
    {
        $response = $this->oauthClient->getTokenByPassword();
    }

    public function test_oauth_client_credentials_authorize(): void // todo
    {
        $response = $this->oauthClient->credentialsAuthorize();
    }
}
