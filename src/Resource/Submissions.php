<?php

namespace DocuSealCo\DocuSeal\Resource;

use DocuSealCo\DocuSeal\Requests\Submissions\ArchiveSubmission;
use DocuSealCo\DocuSeal\Requests\Submissions\CreateSubmission;
use DocuSealCo\DocuSeal\Requests\Submissions\CreateSubmissionsFromEmails;
use DocuSealCo\DocuSeal\Requests\Submissions\GetSubmission;
use DocuSealCo\DocuSeal\Requests\Submissions\ListAllSubmissions;
use DocuSealCo\DocuSeal\Resource;
use Saloon\Http\Response;

class Submissions extends Resource
{
	/**
	 * @param int $templateId The unique identifier of the document template. Allows to receive only submissions for a specific template.
	 * @param string $applicationKey Filter submissions by the given `application_key` value.
	 * @param string $templateFolder Filter submissions by template folder name.
	 * @param int $limit The number of submissions to return. Default value is 10. Maximum value is 100.
	 * @param int $before The unique identifier of the submission to end the list with. Allows to receive only submissions with id less than the specified value.
	 */
	public function listAllSubmissions(
		?int $templateId,
		?string $applicationKey,
		?string $templateFolder,
		?int $limit,
		?int $before,
	): Response
	{
		return $this->connector->send(new ListAllSubmissions($templateId, $applicationKey, $templateFolder, $limit, $before));
	}


	public function createSubmission(): Response
	{
		return $this->connector->send(new CreateSubmission());
	}


	/**
	 * @param int $id The unique identifier of the submission.
	 */
	public function getSubmission(int $id): Response
	{
		return $this->connector->send(new GetSubmission($id));
	}


	/**
	 * @param int $id The unique identifier of the submission.
	 */
	public function archiveSubmission(int $id): Response
	{
		return $this->connector->send(new ArchiveSubmission($id));
	}


	public function createSubmissionsFromEmails(): Response
	{
		return $this->connector->send(new CreateSubmissionsFromEmails());
	}
}
