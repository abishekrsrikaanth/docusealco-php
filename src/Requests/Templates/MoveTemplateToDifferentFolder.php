<?php

namespace DocuSealCo\DocuSeal\Requests\Templates;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Move a template to a different folder
 *
 * The API endpoint provides the functionality to move a document template to a different folder.
 */
class MoveTemplateToDifferentFolder extends Request
{
    protected Method $method = Method::PUT;


    public function resolveEndpoint(): string
    {
        return "/templates/{$this->id}";
    }


    /**
     * @param  int  $id  The unique identifier of the document template.
     */
    public function __construct(
        protected int $id,
        protected string $folderName,
    ) {
    }

    public function defaultBody(): array
    {
        return [
            'template' => [
                'folder_name' => $this->folderName,
            ]
        ];
    }
}
