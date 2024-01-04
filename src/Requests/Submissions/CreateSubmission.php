<?php

namespace DocuSealCo\DocuSeal\Requests\Submissions;

use DateTime;
use DocuSealCo\DocuSeal\Requests\Models\Message;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a submission
 *
 * This API endpoint allows you to create submissions for a document template and send them to the
 * specified submitters
 */
class CreateSubmission extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;


    public function resolveEndpoint(): string
    {
        return "/submissions";
    }


    public function __construct(
        protected int $templateId,
        protected array $submitters,
        protected bool $sendEmail = true,
        protected bool $sendSms = false,
        protected string $order = 'preserved',
        protected ?Message $message = null
    ) {
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
