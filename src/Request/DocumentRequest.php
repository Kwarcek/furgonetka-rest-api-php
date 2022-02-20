<?php

namespace Kwarcek\FurgonetkaRestApi\Request;

use Kwarcek\FurgonetkaRestApi\Entity\Label;
use Kwarcek\FurgonetkaRestApi\FurgonetkaClient;
use Kwarcek\FurgonetkaRestApi\Traits\ResponseTrait;
use Kwarcek\FurgonetkaRestApi\Exceptions\FurgonetkaApiException;

/**
 * Class DocumentRequest
 * @package Kwarcek\FurgonetkaRestApi\Request
 */
class DocumentRequest extends Request
{
    use ResponseTrait;

    const DOCUMENT_TYPE_LABELS = 'labels';
    const DOCUMENT_PROTOCOLS_OTHERS = 'protocols_others';

    protected FurgonetkaClient $client;

    public function __construct(FurgonetkaClient $client)
    {
        $this->client = $client;
    }

    /** @throws FurgonetkaApiException */
    public function getDocumentsSummary(string $uuid): array
    {
        $response = $this->client->get("/documents-command/{$uuid}");

        return $this->response($response);
    }

    /** @throws FurgonetkaApiException */
    public function getDocuments(
        string $uuid,
        array $packages,
        array $documentsTypes = [self::DOCUMENT_TYPE_LABELS, self::DOCUMENT_PROTOCOLS_OTHERS],
        ?Label $label = null
    ): array
    {
        $response = $this->client->put("/documents-command/{$uuid}", [
            'packages' => $packages,
            'documents_types' => $documentsTypes,
            'label' => ($label) ? $label->toArray() : null,
        ]);

        return $this->response($response);
    }
}