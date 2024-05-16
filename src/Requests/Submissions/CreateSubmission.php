<?php

namespace DocuSealCo\DocuSeal\Requests\Submissions;

use CuyZ\Valinor\Mapper\MappingError;
use DocuSealCo\DocuSeal\Models\Submitter;
use DocuSealCo\DocuSeal\Requests\Models\Message;
use DocuSealCo\DocuSeal\Requests\Submissions\Concerns\HandlesDTOResponse;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a submission
 *
 * This API endpoint allows you to create submissions for a document template and send them to the
 * specified submitters
 */
class CreateSubmission extends Request implements HasBody
{
    use HasJsonBody, HandlesDTOResponse;

    protected Method $method = Method::POST;

    public function __construct(
        protected int $templateId,
        protected array $submitters,
        protected bool $sendEmail = true,
        protected bool $sendSms = false,
        protected string $order = 'preserved',
        protected ?Message $message = null
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/submissions";
    }

    /**
     * @throws MappingError
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): array
    {
        $data = $response->json();

        return $this->toDTOArray($data, Submitter::class);
    }

    protected function defaultBody(): array
    {
        $data = [
            'template_id' => $this->templateId,
            'send_email' => $this->sendEmail,
            'send_sms' => $this->sendSms,
            'order' => $this->order,
        ];

        if (isset($this->submitters)) {
            $submitters = [];
            foreach ($this->submitters as $submitter) {
                $submitters[] = $submitter->toArray();
            }

            $data['submission'] = $submitters;
        }

        if (isset($this->message)) {
            $data['message'] = $this->message->toArray();
        }

        return array_filter($data);
    }
}
