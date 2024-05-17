<?php

namespace DocuSealCo\DocuSeal\Models;

use DateTimeInterface;

class SubmissionEvent
{
    public int $id;

    public int $submitter_id;

    public string $event_type;

    public DateTimeInterface $event_timestamp;
}
