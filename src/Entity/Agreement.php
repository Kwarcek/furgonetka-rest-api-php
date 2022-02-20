<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

class Agreement extends Entity
{
    public string $name;
    public Credential $credential;
    public Credential $additionalCredential;
    public ?int $serviceId;

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'service_id' => $this->serviceId,
            'credential' => $this->credential->toArray(),
            'credentials_parcelshop' => $this->additionalCredential->toArray(),
            'credentials_international' => $this->additionalCredential->toArray(),
        ];
    }
}
