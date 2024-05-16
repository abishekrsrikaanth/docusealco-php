<?php

namespace DocuSealCo\DocuSeal\Requests\Submissions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a submission
 *
 * The API endpoint provides the functionality to retrieve information about a submission.
 */
class GetSubmission extends Request
{
    protected Method $method = Method::GET;


    public function resolveEndpoint(): string
    {
        return "/submissions/{$this->id}";
    }


    /**
     * @param int $id The unique identifier of the submission.
     */
    public function __construct(
        protected int $id,
    ) {
    }
}
