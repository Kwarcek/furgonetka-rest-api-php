<?php

namespace Kwarcek\FurgonetkaRestApi\Traits;

use Kwarcek\FurgonetkaRestApi\Request\AccountRequest;
use Kwarcek\FurgonetkaRestApi\Request\CancelRequest;
use Kwarcek\FurgonetkaRestApi\Request\ConfigurationRequest;
use Kwarcek\FurgonetkaRestApi\Request\DocumentRequest;
use Kwarcek\FurgonetkaRestApi\Request\OrderRequest;
use Kwarcek\FurgonetkaRestApi\Request\PackageRequest;
use Kwarcek\FurgonetkaRestApi\Request\PickupRequest;
use Kwarcek\FurgonetkaRestApi\Request\PointRequest;
use Kwarcek\FurgonetkaRestApi\Request\RegulationRequest;

/**
 * Trait RequestTrait
 * @package Kwarcek\FurgonetkaRestApi\Traits
 * @deprecated
 */
trait RequestTrait
{
    public function account(): AccountRequest
    {
        return new AccountRequest($this);
    }

    public function cancel(): CancelRequest
    {
        return new CancelRequest($this);
    }

    public function configuration(): ConfigurationRequest
    {
        return new ConfigurationRequest($this);
    }

    public function document(): DocumentRequest
    {
        return new DocumentRequest($this);
    }

    public function order(): OrderRequest
    {
        return new OrderRequest($this);
    }

    public function package(): PackageRequest
    {
        return new PackageRequest($this);
    }

    public function pickup(): PickupRequest
    {
        return new PickupRequest($this);
    }

    public function point(): PointRequest
    {
        return new PointRequest($this);
    }

    public function regulation(): RegulationRequest
    {
        return new RegulationRequest($this);
    }
}