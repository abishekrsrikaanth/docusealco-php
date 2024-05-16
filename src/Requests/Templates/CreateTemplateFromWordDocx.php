<?php

namespace DocuSealCo\DocuSeal\Requests\Templates;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a template from Word DOCX
 *
 * The API endpoint provides the functionality to create a fillable document template for existing
 * Microsoft Word document. Use <code>{{Field Name;role=Signer1;type=date}}</code> text tags to define
 * fillable fields in the document. See <a href="https://www.docuseal.co/examples/fieldtags.docx"
 * target="_blank" class="link font-bold" >https://www.docuseal.co/examples/fieldtags.docx</a> for more
 * text tag formats. Or specify the exact pixel coordinates of the document fields using `fields`
 * param.
 */
class CreateTemplateFromWordDocx extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;


    public function resolveEndpoint(): string
    {
        return "/templates/docx";
    }


    public function __construct(
        protected string $name,
        protected array $documents,
        protected ?string $folderName = null,
        protected ?string $applicationKey = null
    ) {
    }
}
