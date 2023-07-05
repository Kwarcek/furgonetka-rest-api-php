<?php

namespace Kwarcek\FurgonetkaRestApi\Request;

use Kwarcek\FurgonetkaRestApi\Entity\ParcelLocker\ParcelLockerData;
use Kwarcek\FurgonetkaRestApi\Entity\ParcelLocker\UserAgreement;
use Kwarcek\FurgonetkaRestApi\Entity\ParcelLocker\UserData;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;
use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\Traits\ResponseTrait;

/**
 * Class ParcelLockerRequest
 * @package Kwarcek\FurgonetkaRestApi\Request
 */
class ParcelLockerRequest extends Request
{
    use ResponseTrait;

    protected FurgonetkaClient $client;

    public function __construct(FurgonetkaClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param UserData $userData
     * @param ParcelLockerData $parcelLockerData
     * @param string[] $files
     * @param UserAgreement $agreements
     * @return array{
     *      code: int,
     *     data: array{}
     *     }
     * @throws FurgonetkaApiException
     */
    public function apply(
        UserData $userData,
        ParcelLockerData $parcelLockerData,
        array $files,
        UserAgreement $agreements
    ): array
    {
        $response = $this->client->post('/parcel-locker-application', [
            'user_data' => $userData,
            'parcel_locker_data' => $parcelLockerData,
            'files' => $files,
            'agreements' => $agreements,
        ]);

        return $this->response($response);
    }
}