<?php

namespace Kwarcek\FurgonetkaRestApi\Test;

use GuzzleHttp\Client;
use Kwarcek\FurgonetkaRestApi\Config\Credentials;
use Kwarcek\FurgonetkaRestApi\FurgonetkaAuth;
use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;

class AuthRequestTest extends TestCase
{
    public function test_auth_request()
    {
        $client = new FurgonetkaClient(
            Credentials::API_URL,
            $this->helper->getToken()
        );
        $client = $client->getClient();

        $this->assertInstanceOf(Client::class, $client);
    }
}
