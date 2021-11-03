<?php

declare(strict_types=1);

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Entity
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
abstract class Entity
{
    /**
     * @return array
     */
    abstract public function toArray(): array;
}