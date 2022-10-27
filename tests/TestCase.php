<?php

declare(strict_types=1);

namespace Kwarcek\FurgonetkaRestApi\Test;

use GuzzleHttp\Client;
use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\LoginCredential;
use Kwarcek\FurgonetkaRestApi\Test\Helpers\RequestHelper;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Class TestCase
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
abstract class TestCase extends BaseTestCase
{
    public const DEFAULT_CARRIER = 'dpd';

    public RequestHelper $helper;
    public FurgonetkaClient $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = $this->getFurgonetkaClient();
        $this->helper = new RequestHelper($this->client);
    }

    private function getFurgonetkaClient(): FurgonetkaClient
    {
        $credentials = new LoginCredential();
        $credentials->clientSecret = '';
        $credentials->clientId = '';
        $credentials->username = '';
        $credentials->password = '';

        return new FurgonetkaClient($this->getGuzzleClient(), $credentials);
    }

    private function getGuzzleClient(): Client
    {
        return new Client([
            'base_uri' => LoginCredential::FURGONETKA_DEFAULT_TEST_API_URL,
            'timeout' => 10,
            'verify' => false,
        ]);
    }
}