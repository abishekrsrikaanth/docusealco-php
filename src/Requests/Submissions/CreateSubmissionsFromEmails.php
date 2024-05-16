<?php

namespace DocuSealCo\DocuSeal\Requests\Submissions;

use DocuSealCo\DocuSeal\Requests\Models\Message;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create submissions from emails
 *
 * This API endpoint allows you to create submissions for a document template and send them to the
 * specified email addresses.
 */
class CreateSubmissionsFromEmails extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;


    public function resolveEndpoint(): string
    {
        return "/submissions/emails";
    }


    public function __construct(
        protected int $templateId,
        protected array $emails,
        protected bool $sendEmail = true,
        protected ?Message $message = null
    ) {
    }

    protected function defaultBody(): array
    {
        $data = [
            'template_id' => $this->templateId,
            'emails' => implode(",", $this->emails),
            'send_email' => $this->sendEmail,
        ];

        if (isset($this->message)) {
            $data['message'] = $this->message->toArray();
        }

        return $data;
    }
}
