<?php

namespace DocuSealCo\DocuSeal\Requests\Templates;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a template from HTML
 *
 * The API endpoint provides the functionality to seamlessly generate a PDF document template by
 * utilizing the provided HTML content while incorporating pre-defined fields.
 */
class CreateTemplateFromHtml extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;


    public function resolveEndpoint(): string
    {
        return "/templates/html";
    }


    public function __construct()
    {
    }
}
