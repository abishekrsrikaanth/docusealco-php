<?php

namespace DocuSealCo\DocuSeal\Models;

use DateTimeInterface;

class Submission
{
    public int $id;

    public string $source;

    public ?string $audit_log_url;

    public string $submitters_order;

    public DateTimeInterface $created_at;

    public DateTimeInterface $updated_at;

    public ?DateTimeInterface $archived_at;

    /** @var array<Submitter> */
    public array $submitters;

    public Template $template;

    public User $created_by_user;

    /** @var array<SubmissionEvent> */
    public array $submission_events;

    /** @var array<Document> */
    public array $documents;
    public string $status;
    public ?DateTimeInterface $completed_at;
}
