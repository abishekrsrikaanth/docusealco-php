<?php

namespace DocuSealCo\DocuSeal\Requests\Templates;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Clone a template
 *
 * The API endpoint allows to clone existing template into a new template.
 */
class CloneTemplate extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/templates/{$this->id}/clone";
	}


	/**
	 * @param int $id The unique identifier of the document template.
	 */
	public function __construct(
		protected int $id,
	) {
	}
}
