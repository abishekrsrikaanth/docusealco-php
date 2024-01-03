<?php

namespace DocuSealCo\DocuSeal\Requests\Submissions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Archive a submission
 *
 * The API endpoint allows to archive a submission.
 */
class ArchiveSubmission extends Request
{
	protected Method $method = Method::DELETE;


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
