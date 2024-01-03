<?php

namespace DocuSealCo\DocuSeal\Requests\Submissions;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create submissions from emails
 *
 * This API endpoint allows you to create submissions for a document template and send them to the
 * specified email addresses.
 */
class CreateSubmissionsFromEmails extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/submissions/emails";
	}


	public function __construct()
	{
	}
}
