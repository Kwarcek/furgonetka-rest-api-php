<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

class Regulation extends Entity
{
    /** @var string $service */
    public string $service;

    /** @var int $version */
    public int $version;

    /** @var string $datetime */
    public string $datetime;

    /** @var bool $accepted */
    public bool $accepted;

    /** @var string $name */
    public string $name;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'service' => $this->service,
            'version' => $this->version,
            'datetime' => $this->datetime,
            'accepted' => $this->accepted,
            'name' => $this->name,
        ];
    }
}
