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
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;

class Templates extends Resource
{
    /**
     * @param  string|null  $applicationKey  The unique applications-specific identifier provided for the template via API or Embedded template form builder. Allows to receive only templates with your specified application key.
     * @param  string|null  $folder  Filter templates by folder name.
     * @param  bool  $archived  Get only archived templates instead of active ones.
     * @param  int|null  $limit  The number of templates to return. Default value is 10. Maximum value is 100.
     * @param  int|null  $before  The unique identifier of the template to end the list with. Allows to receive only templates with id less than the specified value.
     * @param  int|null  $after  The unique identifier of the template to start the list from. Allows to receive only templates with id greater than the specified value.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function listAllTemplates(
        ?string $applicationKey = null,
        ?string $folder = null,
        ?bool $archived = null,
        ?int $limit = null,
        ?int $before = null,
        ?int $after = null,
    ): Response {
        return $this->connector->send(new ListAllTemplates($applicationKey, $folder, $archived, $limit, $before, $after));
    }


    /**
     * @param  int  $id  The unique identifier of the document template.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getTemplate(int $id): Response
    {
        return $this->connector->send(new GetTemplate($id));
    }


    /**
     * @param  int  $id  The unique identifier of the document template.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function moveTemplateToDifferentFolder(int $id): Response
    {
        return $this->connector->send(new MoveTemplateToDifferentFolder($id));
    }


    /**
     * @param  int  $id  The unique identifier of the document template.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function archiveTemplate(int $id): Response
    {
        return $this->connector->send(new ArchiveTemplate($id));
    }


    /**
     * @param  int  $id  The unique identifier of the document template.
     * @return Response
     * @throws FatalRequestException
     * @throws RequestException
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
