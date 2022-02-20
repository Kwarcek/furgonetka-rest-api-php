<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

class Regulation extends Entity
{
    public string $service;
    public int $version;
    public string $datetime;
    public bool $accepted;
    public string $name;

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
