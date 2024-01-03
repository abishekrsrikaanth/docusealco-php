<?php

namespace DocuSealCo\DocuSeal\Resource;

use DocuSealCo\DocuSeal\Requests\Submitters\GetSubmitter;
use DocuSealCo\DocuSeal\Requests\Submitters\ListAllSubmitters;
use DocuSealCo\DocuSeal\Requests\Submitters\UpdateSubmitter;
use DocuSealCo\DocuSeal\Resource;
use Saloon\Http\Response;

class Submitters extends Resource
{
	/**
	 * @param int $id The unique identifier of the submitter.
	 */
	public function getSubmitter(int $id): Response
	{
		return $this->connector->send(new GetSubmitter($id));
	}


	/**
	 * @param int $id The unique identifier of the submitter.
	 */
	public function updateSubmitter(int $id): Response
	{
		return $this->connector->send(new UpdateSubmitter($id));
	}


	/**
	 * @param int $submissionId The unique identifier of the submission. Allows to receive only submitters for a submission.
	 * @param string $applicationKey The unique applications-specific identifier provided for a submitter when initializing a signature request. Allows to receive only submitters with a specified application key.
	 * @param int $limit The number of submitters to return. Default value is 10. Maximum value is 100.
	 * @param int $before The unique identifier of the submitter to end the list with. Allows to receive only submitters with id less than the specified value.
	 */
	public function listAllSubmitters(?int $submissionId, ?string $applicationKey, ?int $limit, ?int $before): Response
	{
		return $this->connector->send(new ListAllSubmitters($submissionId, $applicationKey, $limit, $before));
	}
}
