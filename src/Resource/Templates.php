<?php

namespace DocuSealCo\DocuSeal\Resource;

use DocuSealCo\DocuSeal\Requests\Templates\ArchiveTemplate;
use DocuSealCo\DocuSeal\Requests\Templates\CloneTemplate;
use DocuSealCo\DocuSeal\Requests\Templates\CreateTemplateFromExistingPdf;
use DocuSealCo\DocuSeal\Requests\Templates\CreateTemplateFromHtml;
use DocuSealCo\DocuSeal\Requests\Templates\CreateTemplateFromWordDocx;
use DocuSealCo\DocuSeal\Requests\Templates\GetTemplate;
use DocuSealCo\DocuSeal\Requests\Templates\ListAllTemplates;
use DocuSealCo\DocuSeal\Requests\Templates\MoveTemplateToDifferentFolder;
use DocuSealCo\DocuSeal\Resource;
use Saloon\Http\Response;

class Templates extends Resource
{
	/**
	 * @param string $applicationKey The unique applications-specific identifier provided for the template via API or Embedded template form builder. Allows to receive only templates with your specified application key.
	 * @param string $folder Filter templates by folder name.
	 * @param bool $archived Get only archived templates instead of active ones.
	 * @param int $limit The number of templates to return. Default value is 10. Maximum value is 100.
	 * @param int $before The unique identifier of the template to end the list with. Allows to receive only templates with id less than the specified value.
	 */
	public function listAllTemplates(
		?string $applicationKey,
		?string $folder,
		?bool $archived,
		?int $limit,
		?int $before,
	): Response
	{
		return $this->connector->send(new ListAllTemplates($applicationKey, $folder, $archived, $limit, $before));
	}


	/**
	 * @param int $id The unique identifier of the document template.
	 */
	public function getTemplate(int $id): Response
	{
		return $this->connector->send(new GetTemplate($id));
	}


	/**
	 * @param int $id The unique identifier of the document template.
	 */
	public function moveTemplateToDifferentFolder(int $id): Response
	{
		return $this->connector->send(new MoveTemplateToDifferentFolder($id));
	}


	/**
	 * @param int $id The unique identifier of the document template.
	 */
	public function archiveTemplate(int $id): Response
	{
		return $this->connector->send(new ArchiveTemplate($id));
	}


	/**
	 * @param int $id The unique identifier of the document template.
	 */
	public function cloneTemplate(int $id): Response
	{
		return $this->connector->send(new CloneTemplate($id));
	}


	public function createTemplateFromHtml(): Response
	{
		return $this->connector->send(new CreateTemplateFromHtml());
	}


	public function createTemplateFromWordDocx(): Response
	{
		return $this->connector->send(new CreateTemplateFromWordDocx());
	}


	public function createTemplateFromExistingPdf(): Response
	{
		return $this->connector->send(new CreateTemplateFromExistingPdf());
	}
}
