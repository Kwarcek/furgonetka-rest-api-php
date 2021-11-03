<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

class Agreement extends Entity
{
    /** @var string $name */
    public string $name;

    /** @var Credential $credential */
    public Credential $credential;

    /** @var Credential $additionalCredential */
    public Credential $additionalCredential;

    /** @var int|null $serviceId */
    public ?int $serviceId;

    /**
     * @return array
     */
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
