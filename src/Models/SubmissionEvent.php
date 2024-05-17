<?php

namespace DocuSealCo\DocuSeal\Models;

use DateTime;
use Spatie\LaravelData\Data;

class SubmissionEvent extends Data
{
    public int $id;

    public int $submitter_id;

    public string $event_type;

    public DateTime $event_timestamp;
}
