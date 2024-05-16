<?php

namespace DocuSealCo\DocuSeal\Resource;

use DocuSealCo\DocuSeal\Models\Submitter;
use DocuSealCo\DocuSeal\Requests\Models\Message;
use DocuSealCo\DocuSeal\Requests\Submissions\ArchiveSubmission;
use DocuSealCo\DocuSeal\Requests\Submissions\CreateSubmission;
use DocuSealCo\DocuSeal\Requests\Submissions\CreateSubmissionsFromEmails;
use DocuSealCo\DocuSeal\Requests\Submissions\GetSubmission;
use DocuSealCo\DocuSeal\Requests\Submissions\ListAllSubmissions;
use DocuSealCo\DocuSeal\Resource;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;

class Submissions extends Resource
{
    /**
     * @param  int|null  $templateId  The unique identifier of the document template. Allows to receive only submissions for a specific template.
     * @param  string|null  $applicationKey  Filter submissions by the given `application_key` value.
     * @param  string|null  $templateFolder  Filter submissions by template folder name.
     * @param  int|null  $limit  The number of submissions to return. Default value is 10. Maximum value is 100.
     * @param  int|null  $before  The unique identifier of the submission to end the list with. Allows to receive only submissions with id less than the specified value.
     * @param  int|null  $after  The unique identifier of the submission to start the list with. Allows to receive only submissions with id greater than the specified value.
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function listAllSubmissions(
        ?int $templateId = null,
        ?string $applicationKey = null,
        ?string $templateFolder = null,
        ?int $limit = 10,
        ?int $before = null,
        ?int $after = null,
    ): Response {
        return $this->connector->send(new ListAllSubmissions($templateId, $applicationKey, $templateFolder, $limit, $before, $after));
    }

    /**
     * @param  Submitter[]  $submitters
     * @return Submitter[]
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createSubmission(
        int $templateId,
        array $submitters,
        bool $sendEmail = true,
        bool $sendSms = false,
        string $order = 'preserved',
        ?Message $message = null
    ): array {
        $response = $this->connector->send(new CreateSubmission($templateId, $submitters, $sendEmail, $sendSms, $order, $message));

        return $response->dtoOrFail();
    }

    /**
     * @param  int  $id  The unique identifier of the submission.
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSubmission(int $id): Response
    {
        return $this->connector->send(new GetSubmission($id));
    }

    /**
     * @param  int  $id  The unique identifier of the submission.
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function archiveSubmission(int $id): Response
    {
        return $this->connector->send(new ArchiveSubmission($id));
    }

    public function createSubmissionsFromEmails(int $templateId, array $emails, $sendEmail = true, ?Message $message = null): Response
    {
        return $this->connector->send(new CreateSubmissionsFromEmails($templateId, $emails, $sendEmail, $message));
    }
}
