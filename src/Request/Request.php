<?php

namespace Kwarcek\FurgonetkaRestApi\Request;

use Kwarcek\FurgonetkaRestApi\FurgonetkaAuth;
use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\LoginCredential;
use Psr\Http\Message\ResponseInterface;
use Exception;

/**
 * Class Request
 * @package Kwarcek\FurgonetkaRestApi\Request
 */
abstract class Request
{
    abstract protected function response(ResponseInterface $response): array;
}