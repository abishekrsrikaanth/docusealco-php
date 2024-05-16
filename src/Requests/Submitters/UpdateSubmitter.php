<?php

namespace DocuSealCo\DocuSeal\Requests\Submitters;

use DocuSealCo\DocuSeal\Requests\Models\Submitter;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a submitter
 *
 * The API endpoint provides allows to update submitter details, field values and re-send emails.
 */
class UpdateSubmitter extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/submitters/{$this->id}";
    }

    /**
     * @param  int  $id  The unique identifier of the submitter.
     */
    public function __construct(
        protected int $id,
        protected Submitter $submitter,
    ) {
    }

    public function defaultBody(): array
    {
        return $this->submitter->toArray();
    }
}
