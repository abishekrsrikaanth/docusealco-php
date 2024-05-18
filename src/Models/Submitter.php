<?php

namespace DocuSealCo\DocuSeal\Models;

use DateTime;
use DocuSealCo\DocuSeal\Casts\DateTime as DateTimeCast;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Submitter extends Data
{
    public int $id;

    public int $submission_id;

    public string $uuid;

    public string $email;

    #[MapInputName('ua')]
    public ?string $userAgent;

    public ?string $ip;

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

    /** @var Value[] */
    public array|Optional $values;

    public array $preferences;

    public string $role;

    public string|Optional $embed_src;

    /** @var Document[] */
    public array|Optional $documents;

    public ?string $audit_log_url;

    public ?string $submission_url;

    public Template|Optional $template;

    public Submission|Optional $submission;
}
