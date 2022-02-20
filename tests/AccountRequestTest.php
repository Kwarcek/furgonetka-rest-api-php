<?php

namespace Kwarcek\FurgonetkaRestApi\Test;

use Kwarcek\FurgonetkaRestApi\Entity\Agreement;
use Kwarcek\FurgonetkaRestApi\Entity\Credential;
use Kwarcek\FurgonetkaRestApi\Request\AccountRequest;
use Ramsey\Uuid\Uuid;

/**
 * Class AccountRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class AccountRequestTest extends TestCase
{
    protected AccountRequest $request;

    public function setUp(): void
    {
        parent::setUp();
        $this->request = $this->client->account();
    }

    public function test_account_request_get_carrier_list()
    {
        $response = $this->request->getCarrierList();

        $this->assertEquals($response['code'], 200);
        $this->assertGreaterThan(0, count($response['data']['services']));
    }

    public function test_account_request_get_oauth_data() // todo
    {
        $response = $this->request->getOAuthData('');

        $this->assertEquals($response['code'], 200);
    }

    public function test_account_request_get_account_advanced_settings()
    {
        $response = $this->request->getAccountAdvancedSettings();

        $this->assertEquals($response['code'], 200);
        $this->assertLessThan(count($response['data']), 0);
        $this->assertArrayHasKey('user_reference_number', $response['data']);
    }

    public function test_account_request_get_list_of_shipment_templates()
    {
        $response = $this->request->getlistOfShipmentTemplates();

        $this->assertEquals($response['code'], 200);
        $this->assertLessThan(count($response['data']), 0);
    }

    public function test_account_request_get_list_of_entries_in_the_address_book()
    {
        $response = $this->request->getListOfEntriesInTheAddressBook();

        $this->assertEquals($response['code'], 200);
        $this->assertLessThan(count($response['data']), 0);
    }

    public function test_account_request_dhl_agreement() //todo
    {
        $uuid = Uuid::uuid4()->toString();

        $credentials = new Credential();
        $credentials->user = '';
        $credentials->password = '';
        $credentials->sap = '';

        $additionalCredentials = new Credential();
        $additionalCredentials->user = '';
        $additionalCredentials->password = '';

        $agreement = new Agreement();
        $agreement->name = '';
        $agreement->credential = $credentials;
        $agreement->serviceId = '';
        $agreement->additionalCredential = $additionalCredentials;

        $response = $this->request->dhlAgreement($uuid, $agreement);

        $this->assertEquals($response['code'], 200);
    }

    public function test_account_request_dpd_agreement() //todo
    {
        $uuid = Uuid::uuid4()->toString();

        $credentials = new Credential();
        $credentials->login = '';
        $credentials->password = '';
        $credentials->master_fid = '';

        $additionalCredentials = new Credential();
        $additionalCredentials->login = '';
        $additionalCredentials->password = '';
        $additionalCredentials->master_fid = '';

        $agreement = new Agreement();
        $agreement->name = 'Agreement DPD';
        $agreement->credential = $credentials;
        $agreement->serviceId = '';
        $agreement->additionalCredential = $additionalCredentials;

        $response = $this->request->dpdAgreement($uuid, $agreement);

        /** Async XD */
        sleep(2);

        $this->account_request_agreement_summary($uuid);

        $this->assertEquals($response['code'], 200);
    }

    public function test_account_request_fedex_agreement() //todo
    {
        $uuid = Uuid::uuid4()->toString();

        $credentials = new Credential();
        $credentials->account_number = '';
        $credentials->key = '';

        $additionalCredentials = new Credential();
        $additionalCredentials->account_number = '';
        $additionalCredentials->meter_number = '';
        $additionalCredentials->key = '';
        $additionalCredentials->password = '';

        $agreement = new Agreement();
        $agreement->name = 'Agreement Fedex';
        $agreement->credential = $credentials;
        $agreement->serviceId = null;
        $agreement->additionalCredential = $additionalCredentials;

        $response = $this->request->fedexAgreement($uuid, $agreement);

        $this->assertEquals($response['code'], 200);
    }

    public function test_account_request_gls_agreement() //todo
    {
        $uuid = Uuid::uuid4()->toString();

        $credentials = new Credential();
        $credentials->user = '';
        $credentials->password = '';

        $agreement = new Agreement();
        $agreement->name = 'Agreement GLS';
        $agreement->credential = $credentials;
        $agreement->serviceId = null;

        $response = $this->request->glsAgreement($uuid, $agreement);

        $this->assertEquals($response['code'], 200);
    }

    public function test_account_request_inpost_agreement() //todo
    {
        $uuid = Uuid::uuid4()->toString();

        $credentials = new Credential();
        $credentials->shipx_client_id = '';
        $credentials->shipx_token = '';
        $credentials->allegro_deal = '';

        $agreement = new Agreement();
        $agreement->name = 'Agreement Inpost';
        $agreement->credential = $credentials;
        $agreement->serviceId = null;

        $response = $this->request->inpostAgreement($uuid, $agreement);

        $this->assertEquals($response['code'], 200);
    }

    public function test_account_request_orlen_agreement() //todo
    {
        $uuid = Uuid::uuid4()->toString();

        $credentials = new Credential();
        $credentials->user = '';
        $credentials->password = '';

        $agreement = new Agreement();
        $agreement->name = '';
        $agreement->credential = $credentials;
        $agreement->serviceId = '';

        $response = $this->request->orlenAgreement($uuid, $agreement);

        $this->assertEquals($response['code'], 200);
    }

    public function test_account_request_poczta_polska_agreement() //todo
    {
        $uuid = Uuid::uuid4()->toString();

        $credentials = new Credential();
        $credentials->email = '';
        $credentials->password = '';
        $credentials->post_office_id = '';

        $agreement = new Agreement();
        $agreement->name = '';
        $agreement->credential = $credentials;
        $agreement->serviceId = '';

        $response = $this->request->pocztaPolskaAgreement($uuid, $agreement);

        $this->assertEquals($response['code'], 200);
    }

    public function test_account_request_ups_agreement() //todo
    {
        $uuid = Uuid::uuid4()->toString();

        $credentials = new Credential();
        $credentials->shipper_number = '';
        $credentials->user_id = '';
        $credentials->password = '';

        $agreement = new Agreement();
        $agreement->name = '';
        $agreement->credential = $credentials;
        $agreement->serviceId = '';

        $response = $this->request->upsAgreement($uuid, $agreement);

        $this->assertEquals($response['code'], 200);
    }

    public function account_request_agreement_summary(string $uuid) //todo
    {
        $response = $this->request->agreementSummary($uuid);

        $this->assertEquals($response['code'], 200);
    }

    public function test_account_request_delete_agreement() //todo
    {
        $serviceId = '8800592';

        $response = $this->request->deleteAgreement($serviceId);

        $this->assertEquals($response['code'], 200);
    }

    public function test_account_request_get_dhl_agreement()
    {
        $serviceId = '8800600';

        $response = $this->request->getDhlAgreement($serviceId);

        $this->assertEquals($response['code'], 200);
        $this->assertLessThan(count($response['data']), 0);
        $this->assertArrayHasKey('credentials',$response['data']);
    }

    public function test_account_request_get_dpd_agreement()
    {
        $serviceId = '8800592';

        $response = $this->request->getDpdAgreement($serviceId);

        $this->assertEquals($response['code'], 200);
        $this->assertLessThan(count($response['data']), 0);
        $this->assertArrayHasKey('credentials',$response['data']);
    }

    public function test_account_request_get_fedex_agreement()
    {
        $serviceId = '8800593';

        $response = $this->request->getFedexAgreement($serviceId);

        $this->assertEquals($response['code'], 200);
        $this->assertLessThan(count($response['data']), 0);
        $this->assertArrayHasKey('credentials',$response['data']);
    }

    public function test_account_request_get_gls_agreement()
    {
        $serviceId = '8800595';

        $response = $this->request->getGlsAgreement($serviceId);

        $this->assertEquals($response['code'], 200);
        $this->assertLessThan(count($response['data']), 0);
        $this->assertArrayHasKey('credentials',$response['data']);
    }

    public function test_account_request_get_inpost_agreement()
    {
        $serviceId = '8800597';

        $response = $this->request->getInpostAgreement($serviceId);

        $this->assertEquals($response['code'], 200);
        $this->assertLessThan(count($response['data']), 0);
        $this->assertArrayHasKey('credentials',$response['data']);
    }

    public function test_account_request_get_orlen_agreement()
    {
        $serviceId = '8800596';

        $response = $this->request->getOrlenAgreement($serviceId);

        $this->assertEquals($response['code'], 200);
        $this->assertLessThan(count($response['data']), 0);
        $this->assertArrayHasKey('credentials',$response['data']);
    }

    public function test_account_request_get_poczta_polska_agreement()
    {
        $serviceId = '8800596';

        $response = $this->request->getPocztaPolskaAgreement($serviceId);

        $this->assertEquals($response['code'], 200);
        $this->assertLessThan(count($response['data']), 0);
        $this->assertArrayHasKey('credentials',$response['data']);
    }

    public function test_account_request_get_ups_agreement()
    {
        $serviceId = '8800594';

        $response = $this->request->getUpsAgreement($serviceId);

        $this->assertEquals($response['code'], 200);
        $this->assertLessThan(count($response['data']), 0);
        $this->assertArrayHasKey('credentials',$response['data']);
    }
}
