<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

/**
 * Class Cod
 * @package Kwarcek\FurgonetkaRestApi\Entity
 */
class Cod extends Entity
{
    public float $amount = 0;
    public bool $express = false;
    public string $iban = '';
    public string $name = '';
    public bool $transferDone = false;
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
