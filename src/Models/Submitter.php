<?php

namespace DocuSealCo\DocuSeal\Models;

use DateTime;
use DocuSealCo\DocuSeal\Casts\DateTime as DateTimeCast;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class Submitter extends Data
{
    public int $id;
    public int $submission_id;
    public string $uuid;
    public string $email;
    public string $slug;
    #[WithCast(DateTimeCast::class)]
    public ?DateTime $sent_at;
    #[WithCast(DateTimeCast::class)]
    public ?DateTime $opened_at;
    #[WithCast(DateTimeCast::class)]
    public ?DateTime $completed_at;
    #[WithCast(DateTimeCast::class)]
    public DateTime $created_at;
    #[WithCast(DateTimeCast::class)]
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
