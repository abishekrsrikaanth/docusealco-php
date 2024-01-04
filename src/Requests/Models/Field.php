<?php

namespace DocuSealCo\DocuSeal\Requests\Models;

class Field
{
    public function __construct(
        protected string $name,
        protected ?string $defaultValue = null,
        protected ?string $validationPattern = null,
        protected ?string $invalidMessage = null,
        protected ?bool $readOnly = false,
    ) {
    }

    public function toArray(): array
    {
        return array_filter([
            'name' => $this->name,
            'default_value' => $this->defaultValue,
            'validation_pattern' => $this->validationPattern,
            'invalid_message' => $this->invalidMessage,
            'read_only' => $this->readOnly,
        ]);
    }
}
