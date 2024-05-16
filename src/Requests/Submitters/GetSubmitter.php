<?php

namespace DocuSealCo\DocuSeal\Requests\Submitters;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a submitter
 *
 * The API endpoint provides the functionality to retrieve information about a submitter.
 */
class GetSubmitter extends Request
{
    protected Method $method = Method::GET;


    public function resolveEndpoint(): string
    {
        return "/submitters/{$this->id}";
    }


    /**
     * @param int $id The unique identifier of the submitter.
     */
    public function __construct(
        protected int $id,
    ) {
    }
}
