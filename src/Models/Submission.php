<?php

namespace DocuSealCo\DocuSeal\Models;

use Carbon\CarbonImmutable;
use DateTime;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class Submission extends Data
{
    public int $id;

    public string $source;

    public ?string $audit_log_url;

    public string $submitters_order;

    #[WithCast(DateTimeInterfaceCast::class, type: CarbonImmutable::class)]
    public DateTime $created_at;
    #[WithCast(DateTimeInterfaceCast::class, type: CarbonImmutable::class)]
    public DateTime $updated_at;
    #[WithCast(DateTimeInterfaceCast::class, type: CarbonImmutable::class)]
    public ?DateTime $archived_at;

    /** @var Submitter[] */
    public array $submitters;

    public Template $template;

    public User $created_by_user;

    /** @var SubmissionEvent[] */
    public array $submission_events;

    /** @var Document[] */
    public array $documents;

    public string $status;
    #[WithCast(DateTimeInterfaceCast::class, type: CarbonImmutable::class)]
    public DateTime $completed_at;
}
