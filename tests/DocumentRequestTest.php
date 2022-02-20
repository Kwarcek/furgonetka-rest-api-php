<?php

namespace Kwarcek\FurgonetkaRestApi\Test;

use Kwarcek\FurgonetkaRestApi\Request\DocumentRequest;
use Ramsey\Uuid\Uuid;

/**
 * Class DocumentRequestTest
 * @package Kwarcek\FurgonetkaRestApi\Test
 */
class DocumentRequestTest extends TestCase
{
    private DocumentRequest $request;

    public function setUp(): void
    {
        parent::setUp();
        $this->request = $this->client->document();
    }

    public function test_document_request_get_documents()
    {
        $packageId = $this->helper->addPackage()['data']['package_id'];
        $uuid = Uuid::uuid4()->toString();

        $this->helper->orderShipments(Uuid::uuid4()->toString(), [(object)['id' => $packageId]]);

        sleep(2);

        $response = $this->request->getDocuments(
            $uuid,
            [(object) ['id' => $packageId]]
        );

        $this->document_request_get_documents_summary($uuid);

        $this->assertEquals($response['code'], 200);
        $this->assertArrayHasKey('uuid', $response['data']);
    }

    public function document_request_get_documents_summary(string $uuid)
    {
        $response = $this->request->getDocumentsSummary($uuid);

        $this->assertEquals($response['code'], 200);
        $this->assertArrayHasKey('status', $response['data']);
    }
}
