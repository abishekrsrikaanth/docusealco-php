<?php

namespace DocuSealCo\DocuSeal\Requests\Models;

class Message
{
    public function __construct(
        protected ?string $subject = null,
        protected ?string $body = null
    ) {
    }

    public function toArray(): array
    {
        return ['subject' => $this->subject, 'body' => $this->body];
    }
}
