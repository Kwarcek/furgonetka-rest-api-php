<?php

declare(strict_types=1);

namespace Kwarcek\FurgonetkaRestApi\Test;

use Kwarcek\FurgonetkaRestApi\Config\Credentials;
use Kwarcek\FurgonetkaRestApi\FurgonetkaAuth;
use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\Test\Helpers\RequestHelper;
use Exception;

/**
 * Class TestCase
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    const DEFAULT_CARRIER = 'dpd';

    public RequestHelper $helper;

    protected function setUp(): void
    {
        parent::setUp();
        $this->helper = new RequestHelper();
    }
}