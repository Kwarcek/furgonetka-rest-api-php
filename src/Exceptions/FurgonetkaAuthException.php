<?php

namespace Kwarcek\FurgonetkaRestApi\Exceptions;

use Exception;

/**
 * Class FurgonetkaAuthException
 * @package Kwarcek\FurgonetkaRestApi\Exceptions
 */
class FurgonetkaAuthException extends Exception
{
    public function __construct(
        string $message = '',
        int $code = 0,
        Exception $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
