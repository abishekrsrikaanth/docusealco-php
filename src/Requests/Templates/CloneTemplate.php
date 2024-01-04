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
     * @param  int  $id  The unique identifier of the document template.
     * @param  string|null  $name  Template name. Existing name with (Clone) suffix will be used if not specified.
     * @param  string|null  $folderName  The folder's name to which the template should be cloned.
     * @param  string|null  $applicationKey  Your application-specific unique string key to identify this template within your app.
     */
    public function __construct(
        protected int $id,
        protected ?string $name = null,
        protected ?string $folderName = null,
        protected ?string $applicationKey = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'folder_name' => $this->folderName,
            'application_key' => $this->applicationKey,
        ]);
    }
}
