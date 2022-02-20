<?php

namespace Kwarcek\FurgonetkaRestApi\Entity;

class Credential extends Entity
{
    public string $user;
    public string $login;
    public string $password;
    public string $sap;
    public string $masterFid;
    public string $accountNumber;
    public string $key;
    public string $meterNumber;
    public string $shipxClientId;
    public string $shipxToken;
    public string $email;
    public string $postOfficeId;
    public string $shipperNumber;
    public string $userId;
    public bool $allegroDeal;

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
