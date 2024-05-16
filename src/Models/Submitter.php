<?php

namespace DocuSealCo\DocuSeal\Models;

use DateTimeInterface;

class Submitter
{
    public int $id;
    public int $submission_id;
    public string $uuid;
    public string $email;
    public string $slug;
    public ?DateTimeInterface $sent_at;
    public ?DateTimeInterface $opened_at;
    public ?DateTimeInterface $completed_at;
    public DateTimeInterface $created_at;
    public DateTimeInterface $updated_at;
    public string $name;
    public ?string $phone;
    public ?string $external_id;
    /** @var array<string,string|int|bool> */
    public array $metadata;
    public string $status;
    public ?string $application_key;
    /** @var string[]|array{field:string,value:string|int|bool} */
    public array $values;
    /** @var array<string,string|int|bool> */
    public array $preferences;
    public string $role;
    public string $embed_src;
}
