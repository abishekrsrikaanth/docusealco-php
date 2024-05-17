<?php

namespace DocuSealCo\DocuSeal\Models;

use DateTime;
use Spatie\LaravelData\Data;

class Submission extends Data
{
    public int $id;

    public string $source;

    public ?string $audit_log_url;

    public string $submitters_order;

    public DateTime $created_at;

    public DateTime $updated_at;

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
    public DateTime $completed_at;
}
