<?php

namespace DocuSealCo\DocuSeal\Requests\Templates;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a template
 *
 * The API endpoint provides the functionality to retrieve information about a document template.
 */
class GetTemplate extends Request
{
    protected Method $method = Method::GET;


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
