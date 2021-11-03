<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

class Credential extends Entity
{
    /** @var string $user */
    public string $user;

    /** @var string $login */
    public string $login;

    /** @var string $password */
    public string $password;

    /** @var string $sap */
    public string $sap;

    /** @var string $masterFid */
    public string $masterFid;

    /** @var string $accountNumber */
    public string $accountNumber;

    /** @var string $key */
    public string $key;

    /** @var string $meterNumber */
    public string $meterNumber;

    /** @var string $shipxClientId */
    public string $shipxClientId;

    /** @var string $shipxToken */
    public string $shipxToken;

    /** @var string $email */
    public string $email;

    /** @var string $postOfficeId */
    public string $postOfficeId;

    /** @var string $shipperNumber */
    public string $shipperNumber;

    /** @var string $userId */
    public string $userId;

    /** @var bool $allegroDeal */
    public bool $allegroDeal;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'user' => $this->user,
            'password' => $this->password,
            'sap' => $this->sap,
            'master_fid' => $this->masterFid,
            'account_number' => $this->accountNumber,
            'key' => $this->key,
            'meter_number' => $this->meterNumber,
            'shipx_client_id' => $this->shipxClientId,
            'shipx_token' => $this->shipxToken,
            'allegro_deal' => $this->allegroDeal,
            'email' => $this->email,
            'post_office_id' => $this->postOfficeId,
            'shipper_number' => $this->shipperNumber,
            'user_id' => $this->userId,
            'login' => $this->login,
        ];
    }
}
