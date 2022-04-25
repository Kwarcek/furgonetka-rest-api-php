<?php

namespace Kwarcek\FurgonetkaRestApi\Factory;

use Kwarcek\FurgonetkaRestApi\Entity\Entity;

/**
 * Class Factory
 * @package Kwarcek\FurgonetkaRestApi\Factory
 */
abstract class Factory
{
    public abstract static function getEntity(): Entity;
}