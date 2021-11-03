<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Cod
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Cod extends Entity
{
    /** @var float $amount */
    public float $amount = 0.0;

    /** @var bool $express */
    public bool $express = false;

    /** @var string $iban */
    public string $iban = '';

    /** @var string $name */
    public string $name = '';

    /** @var bool $transferDone */
    public bool $transferDone = false;

    /** @var string $transferDateInfo */
    public string $transferDateInfo = '';

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
          'amount' => $this->amount,
          'express' => $this->express,
          'iban' => $this->iban,
          'name' => $this->name,
          'transfer_done' => $this->transferDone,
          'transfer_date_info' => $this->transferDateInfo,
        ];
    }
}
