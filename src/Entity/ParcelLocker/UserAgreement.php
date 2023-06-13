<?php

namespace Kwarcek\FurgonetkaRestApi\Entity\ParcelLocker;

use Kwarcek\FurgonetkaRestApi\Entity\Entity;

/**
 * Class UserAgreement
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class UserAgreement extends Entity
{
    public function __construct(
        public bool $phoneAndEmailProcessingAgreement,
        public bool $marketingAgreement,
    ){}

    public function toArray(): array
    {
        return [
            'phone_and_email_processing_agreement' => $this->phoneAndEmailProcessingAgreement,
            'marketing_agreement' => $this->marketingAgreement,
        ];
    }
}
