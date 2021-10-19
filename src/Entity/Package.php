<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Package
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Package extends Entity
{
    public AddressDetails $pickup;
    public AddressDetails $receiver;
    public int $serviceId;
    public array $parcels;
    public AddressDetails $sender;
    public ?Payer $payer= null;
    public string $userReferenceNumber;
    public string $type;
    public AdditionalServices $additionalServices;

    const TYPE_PACKAGE = 'package';
    const TYPE_ENVELOPE = 'dox';
    const TYPE_PALLET = 'pallet';

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'pickup' => $this->pickup->toArray(),
            'receiver' => $this->receiver->toArray(),
            'service_id' => $this->serviceId,
            'parcels' => $this->parcels,
            'sender' => $this->sender->toArray(),
            'payer' => ($this->payer) ? $this->payer->toArray() : null,
            'user_reference_number' => $this->userReferenceNumber,
            'type' => $this->type,
            'additional_services' => $this->additionalServices->toArray(),
        ];
    }
}
