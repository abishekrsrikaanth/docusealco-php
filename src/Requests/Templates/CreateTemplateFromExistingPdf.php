<?php

namespace DocuSealCo\DocuSeal\Requests\Templates;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a template from existing PDF
 *
 * The API endpoint provides the functionality to create a fillable document template for existing PDF
 * file. Use <code>{{Field Name;role=Signer1;type=date}}</code> text tags to define fillable fields in
 * the document. See <a href="https://www.docuseal.co/examples/fieldtags.pdf" target="_blank"
 * class="link font-bold">https://www.docuseal.co/examples/fieldtags.pdf</a> for more text tag formats.
 * Or specify the exact pixel coordinates of the document fields using `fields` param.'
 */
class CreateTemplateFromExistingPdf extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/templates/pdf";
	}


	public function __construct()
	{
	}
}
