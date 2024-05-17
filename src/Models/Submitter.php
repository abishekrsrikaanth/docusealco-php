<?php

namespace DocuSealCo\DocuSeal\Models;

use DateTime;
use Spatie\LaravelData\Data;

class Submitter extends Data
{
    public int $id;
    public int $submission_id;
    public string $uuid;
    public string $email;
    public string $slug;
    public ?DateTime $sent_at;
    public ?DateTime $opened_at;
    public ?DateTime $completed_at;
    public DateTime $created_at;
    public DateTime $updated_at;
    public string $name;
    public ?string $phone;
    public ?string $external_id;
    public array $metadata;
    public string $status;
    public ?string $application_key;
    public array $values;
    public array $preferences;
    public string $role;
    public ?string $embed_src;
    /** @var Document[] */
    public array $documents;
}
