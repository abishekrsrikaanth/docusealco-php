<?php

namespace DocuSealCo\DocuSeal\Requests\Submissions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all submissions
 *
 * The API endpoint provides the ability to retrieve a list of available submissions.
 */
class ListAllSubmissions extends Request
{
    protected Method $method = Method::GET;


    public function resolveEndpoint(): string
    {
        return "/submissions";
    }


    /**
     * @param  null|int  $templateId  The unique identifier of the document template. Allows to receive only submissions for a specific template.
     * @param  null|string  $applicationKey  Filter submissions by the given `application_key` value.
     * @param  null|string  $templateFolder  Filter submissions by template folder name.
     * @param  null|int  $limit  The number of submissions to return. Default value is 10. Maximum value is 100.
     * @param  null|int  $before  The unique identifier of the submission to end the list with. Allows to receive only submissions with id less than the specified value.
     * @param  int|null  $after  The unique identifier of the submission to start the list from. Allows to receive only submissions with id greater than the specified value.
     */
    public function __construct(
        protected ?int $templateId = null,
        protected ?string $applicationKey = null,
        protected ?string $templateFolder = null,
        protected ?int $limit = null,
        protected ?int $before = null,
        protected ?int $after = null,
    ) {
    }


    public function defaultQuery(): array
    {
        return array_filter([
            'template_id' => $this->templateId,
            'application_key' => $this->applicationKey,
            'template_folder' => $this->templateFolder,
            'limit' => $this->limit,
            'before' => $this->before,
            'after' => $this->after,
        ]);
    }
}
