<?php

namespace DocuSealCo\DocuSeal\Requests\Submissions;

use DocuSealCo\DocuSeal\Concerns\HandlesDTOResponse;
use DocuSealCo\DocuSeal\Models\Submission;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Get a submission
 *
 * The API endpoint provides the functionality to retrieve information about a submission.
 */
class GetSubmission extends Request implements HasBody
{
    use HandlesDTOResponse;
    use HasJsonBody;

    protected Method $method = Method::GET;

    /**
     * @param  int  $id  The unique identifier of the submission.
     */
    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/submissions/{$this->id}";
    }

    /**
     * @param  Response  $response
     * @return Submission
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): Submission
    {
        return $this->toDTO($response->json(), Submission::class);
    }
}
