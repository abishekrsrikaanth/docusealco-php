<?php

namespace DocuSealCo\DocuSeal\Requests\Submissions;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a submission
 *
 * This API endpoint allows you to create submissions for a document template and send them to the
 * specified submitters
 */
class CreateSubmission extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/submissions";
	}


	public function __construct()
	{
	}
}
