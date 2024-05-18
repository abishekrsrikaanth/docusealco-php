<?php

namespace DocuSealCo\DocuSeal\Requests\Submissions;

use DocuSealCo\DocuSeal\Concerns\HandlesDataFilter;
use DocuSealCo\DocuSeal\Concerns\HandlesDTOResponse;
use DocuSealCo\DocuSeal\Models\Submitter;
use DocuSealCo\DocuSeal\Requests\Models\Message;
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
    use HandlesDataFilter;
    use HandlesDTOResponse;
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  Submitter[]  $submitters
     */
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
        return '/submissions';
    }

    /**
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
            'submitters' => $this->submitters,
        ];

        return $this->handleNullData($data);
    }
}
