<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class AdditionalServices
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class AdditionalServices extends Entity
{
    /** @var bool $cod */
    public bool $cod = false;

    /** @var bool $rod */
    public bool $rod = false;

    /** @var bool $cud */
    public bool $cud = false;

    /** @var bool $privateShipping */
    public bool $privateShipping = false;

    /** @var bool $guarantee0930 */
    public bool $guarantee0930 = false;

    /** @var bool $guarantee1200 */
    public bool $guarantee1200 = false;

    /** @var bool $saturdayDelivery */
    public bool $saturdayDelivery = false;

    /** @var bool $additionalHandling */
    public bool $additionalHandling = false;

    /** @var bool $smsPredeliveryInformation */
    public bool $smsPredeliveryInformation = false;

    /** @var bool $documentsSupply */
    public bool $documentsSupply = false;

    /** @var bool $saturdaySundayDelivery */
    public bool $saturdaySundayDelivery = false;

    /** @var bool $guaranteeNextDay */
    public bool $guaranteeNextDay = false;

    /** @var bool $fedexPriority */
    public bool $fedexPriority = false;

    /** @var bool $upsSaver */
    public bool $upsSaver = false;

    /** @var bool $valuableShipment */
    public bool $valuableShipment = false;

    /** @var bool $fragile */
    public bool $fragile = false;

    /** @var bool $personalDelivery */
    public bool $personalDelivery = false;

    /** @var bool $pocztaKurier48 */
    public bool $pocztaKurier48 = false;

    /** @var bool $registeredLetter */
    public bool $registeredLetter = false;

    /** @var bool $registeredCompanyLetter */
    public bool $registeredCompanyLetter = false;

    /** @var bool $registeredLetterInternational */
    public bool $registeredLetterInternational = false;

    /** @var bool $pocztaGlobalexpres */
    public bool $pocztaGlobalexpres = false;

    /** @var bool $deliveryConfirmation */
    public bool $deliveryConfirmation = false;

    /** @var bool $waitingTime */
    public bool $waitingTime = false;

    /** @var bool $pocztaKurier24 */
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