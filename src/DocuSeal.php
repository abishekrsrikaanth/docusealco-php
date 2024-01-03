<?php

namespace DocuSealCo\DocuSeal;

use DocuSealCo\DocuSeal\Resource\Submissions;
use DocuSealCo\DocuSeal\Resource\Submitters;
use DocuSealCo\DocuSeal\Resource\Templates;
use Saloon\Http\Connector;

/**
 * DocuSeal API
 *
 * DocuSeal API specs
 */
class DocuSeal extends Connector
{
	public function resolveBaseUrl(): string
	{
		return 'https://api.docuseal.co';
	}


	public function submissions(): Submissions
	{
		return new Submissions($this);
	}


	public function submitters(): Submitters
	{
		return new Submitters($this);
	}


	public function templates(): Templates
	{
		return new Templates($this);
	}
}
