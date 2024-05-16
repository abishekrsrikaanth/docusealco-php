<?php

namespace DocuSealCo\DocuSeal\Requests\Templates;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all templates
 *
 * The API endpoint provides the ability to retrieve a list of available document templates.
 */
class ListAllTemplates extends Request
{
    protected Method $method = Method::GET;


    public function resolveEndpoint(): string
    {
        return "/templates";
    }


    /**
     * @param  null|string  $applicationKey  The unique applications-specific identifier provided for the template via API or Embedded template form builder. Allows to receive only templates with your specified application key.
     * @param  null|string  $folder  Filter templates by folder name.
     * @param  null|bool  $archived  Get only archived templates instead of active ones.
     * @param  null|int  $limit  The number of templates to return. Default value is 10. Maximum value is 100.
     * @param  null|int  $before  The unique identifier of the template to end the list with. Allows to receive only templates with id less than the specified value.
     * @param  int|null  $after  The unique identifier of the template to start the list from. Allows to receive only templates with id greater than the specified value.
     */
    public function __construct(
        protected ?string $applicationKey = null,
        protected ?string $folder = null,
        protected ?bool $archived = null,
        protected ?int $limit = null,
        protected ?int $before = null,
        protected ?int $after = null,
    ) {
    }


    public function defaultQuery(): array
    {
        return array_filter([
            'application_key' => $this->applicationKey,
            'folder' => $this->folder,
            'archived' => $this->archived,
            'limit' => $this->limit,
            'before' => $this->before,
            'after' => $this->after,
        ]);
    }
}
