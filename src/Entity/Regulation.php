<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

class Regulation extends Entity
{
    public string $service;
    public int $version;
    public string $datetime;
    public bool $accepted;
    public string $name;

    public static function fromArray(array $response): self
    {
        $regulation = new self;
        $regulation->service = $response['service'];
        $regulation->version = $response['version'];
        $regulation->datetime = $response['datetime'];
        $regulation->accepted = $response['accepted'];
        $regulation->name = $response['name'];

        return $regulation;
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
