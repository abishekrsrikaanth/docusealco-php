<?php

namespace DocuSealCo\DocuSeal\Requests\Templates;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Archive a template
 *
 * The API endpoint allows to archive a document template.
 */
class ArchiveTemplate extends Request
{
    protected Method $method = Method::DELETE;


    public function resolveEndpoint(): string
    {
        return "/templates/{$this->id}";
    }


    /**
     * @param int $id The unique identifier of the document template.
     */
    public function __construct(
        protected int $id,
    ) {
    }
}
