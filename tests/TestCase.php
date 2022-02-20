<?php

declare(strict_types=1);

namespace Kwarcek\FurgonetkaRestApi\Test;

use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\LoginCredential;
use Kwarcek\FurgonetkaRestApi\Test\Helpers\RequestHelper;

/**
 * Class TestCase
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    const DEFAULT_CARRIER = 'dpd';

    public RequestHelper $helper;
    public FurgonetkaClient $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->getFurgonetkaClient();
        $this->helper = new RequestHelper($this->client);
    }

    protected function getFurgonetkaClient(): FurgonetkaClient
    {
        $credentials = new LoginCredential();
        $credentials->clientSecret = '';
        $credentials->clientId = '';
        $credentials->username = '';
        $credentials->password = '';

        return $this->client = new FurgonetkaClient($credentials);
    }
}