<?php

namespace DocuSealCo\DocuSeal\Requests\Models;

class Submitter
{
    public function __construct(
        protected string $email,
        protected ?string $name = null,
        protected ?string $role = null,
        protected ?string $phone = null,
        protected ?string $applicationKey = null,
        protected ?bool $sendEmail = true,
        protected ?bool $sendSms = false,
        protected ?array $fields = null,
    ) {
    }

    public function toArray(): array
    {
        $data = [
            'email' => $this->email,
            'name' => $this->name,
            'role' => $this->role,
            'phone' => $this->phone,
            'application_key' => $this->applicationKey,
            'send_email' => $this->sendEmail,
            'send_sms' => $this->sendSms,
        ];

        if (isset($this->fields) && is_array($this->fields) && count($this->fields) > 0) {
            $fields = [];

            foreach ($this->fields as $field) {
                $fields[] = $field->toArray();
            }

            $data['fields'] = $fields;
        }

        return array_filter($data);
    }
}
