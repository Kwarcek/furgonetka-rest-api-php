<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class AdditionalServices
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class AdditionalServices extends Entity
{
    public bool $cod = false;
    public bool $rod = false;
    public bool $cud = false;
    public bool $privateShipping = false;
    public bool $guarantee0930 = false;
    public bool $guarantee1200 = false;
    public bool $saturdayDelivery = false;
    public bool $additionalHandling = false;
    public bool $smsPredeliveryInformation = false;
    public bool $documentsSupply = false;
    public bool $saturdaySundayDelivery = false;
    public bool $guaranteeNextDay = false;
    public bool $fedexPriority = false;
    public bool $upsSaver = false;
    public bool $valuableShipment = false;
    public bool $fragile = false;
    public bool $personalDelivery = false;
    public bool $pocztaKurier48 = false;
    public bool $registeredLetter = false;
    public bool $registeredCompanyLetter = false;
    public bool $registeredLetterInternational = false;
    public bool $pocztaGlobalexpres = false;
    public bool $deliveryConfirmation = false;
    public bool $waitingTime = false;
    public bool $pocztaKurier24 = false;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'cod' => $this->cod,
            'rod' => $this->rod,
            'cud' => $this->cud,
            'private_shipping' => $this->privateShipping,
            'guarantee_0930' => $this->guarantee0930,
            'guarantee_1200' => $this->guarantee1200,
            'saturday_delivery' => $this->saturdayDelivery,
            'additional_handling' => $this->additionalHandling,
            'sms_predelivery_information' => $this->smsPredeliveryInformation,
            'documents_supply' => $this->documentsSupply,
            'saturday_sunday_delivery' => $this->saturdaySundayDelivery,
            'guarantee_next_day' => $this->guaranteeNextDay,
            'fedex_priority' => $this->fedexPriority,
            'ups_saver' => $this->upsSaver,
            'valuable_shipment' => $this->valuableShipment,
            'fragile' => $this->fragile,
            'personal_delivery' => $this->personalDelivery,
            'poczta_kurier48' => $this->pocztaKurier48,
            'registered_letter' => $this->registeredLetter,
            'registered_company_letter' => $this->registeredCompanyLetter,
            'registered_letter_international' => $this->registeredLetterInternational,
            'poczta_globalexpres' => $this->pocztaGlobalexpres,
            'delivery_confirmation' => $this->deliveryConfirmation,
            'waiting_time' => $this->waitingTime,
            'poczta_kurier24' => $this->pocztaKurier24,
        ];
    }
}