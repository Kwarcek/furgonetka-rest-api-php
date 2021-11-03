<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Package
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Package extends Entity
{
    /** @var AddressDetails $pickup */
    public AddressDetails $pickup;

    /** @var AddressDetails $receiver */
    public AddressDetails $receiver;

    /** @var int $serviceId */
    public int $serviceId;

    /** @var array $parcels */
    public array $parcels;

    /** @var AddressDetails $sender */
    public AddressDetails $sender;

    /** @var Payer|null $payer */
    public ?Payer $payer = null;

    /** @var string $userReferenceNumber */
    public string $userReferenceNumber;

    /** @var string $type */
    public string $type;

    /** @var AdditionalServices $additionalServices */
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
