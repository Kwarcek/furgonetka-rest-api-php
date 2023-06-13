<?php

namespace Kwarcek\FurgonetkaRestApi\Entity\ParcelLocker;

use Kwarcek\FurgonetkaRestApi\Entity\Entity;

/**
 * Class UserData
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class UserData extends Entity
{
    public function __construct(
        public string $name,
        public string $surname,
        public string $email,
        public string $phone
    ){}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}
