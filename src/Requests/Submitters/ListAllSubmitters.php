<?php

namespace DocuSealCo\DocuSeal\Requests\Submitters;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all submitters
 *
 * The API endpoint provides the ability to retrieve a list of submitters.
 */
class ListAllSubmitters extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/submitters";
	}


	/**
	 * @param null|int $submissionId The unique identifier of the submission. Allows to receive only submitters for a submission.
	 * @param null|string $applicationKey The unique applications-specific identifier provided for a submitter when initializing a signature request. Allows to receive only submitters with a specified application key.
	 * @param null|int $limit The number of submitters to return. Default value is 10. Maximum value is 100.
	 * @param null|int $before The unique identifier of the submitter to end the list with. Allows to receive only submitters with id less than the specified value.
	 */
	public function __construct(
		protected ?int $submissionId = null,
		protected ?string $applicationKey = null,
		protected ?int $limit = null,
		protected ?int $before = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'submission_id' => $this->submissionId,
			'application_key' => $this->applicationKey,
			'limit' => $this->limit,
			'before' => $this->before,
		]);
	}
}
