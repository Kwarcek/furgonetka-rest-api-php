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

    public const DOCUMENT_TYPE_LABELS = 'labels';
    public const DOCUMENT_PROTOCOLS_OTHERS = 'protocols_others';

    protected FurgonetkaClient $client;

    public function __construct(FurgonetkaClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $uuid
     *
     * @return array{
     *            code: integer,
     *            data: array{
     *              status: string,
     *              datetime_change: string|null,
     *              errors: object[],
     *              uuid: string,
     *              url: string|null,
     *             },
     *        }
     * @throws FurgonetkaApiException
     */
    public function getDocumentsSummary(string $uuid): array
    {
        $response = $this->client->get("/documents-command/{$uuid}");

        return $this->response($response);
    }

    /**
     * @param string $uuid
     * @param object[] $packages
     * @param string[] $documentsTypes
     * @param Label|null $label
     * @return array{
     *            code: integer,
     *            data: array{
     *              uuid: string,
     *             },
     *        }
     * @throws FurgonetkaApiException
     */
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