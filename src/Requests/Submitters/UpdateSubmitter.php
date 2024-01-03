<?php

namespace DocuSealCo\DocuSeal\Requests\Submitters;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update a submitter
 *
 * The API endpoint provides allows to update submitter details, field values and re-send emails.
 */
class UpdateSubmitter extends Request
{
	protected Method $method = Method::PUT;


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
