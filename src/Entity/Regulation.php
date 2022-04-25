<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

class Regulation extends Entity
{
    public string $service;
    public int $version;
    public string $datetime;
    public bool $accepted;
    public string $name;

    public function fromArray(array $response): Regulation
    {
        $this->service = $response['service'];
        $this->version = $response['version'];
        $this->datetime = $response['datetime'];
        $this->accepted = $response['accepted'];
        $this->name = $response['name'];

        return $this;

    }

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
