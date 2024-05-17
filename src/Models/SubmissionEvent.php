<?php

namespace DocuSealCo\DocuSeal\Models;

use DateTime;
use DocuSealCo\DocuSeal\Casts\DateTime as DateTimeCast;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class SubmissionEvent extends Data
{
    public int $id;

    public int $submitter_id;

    public string $event_type;
    #[WithCast(DateTimeCast::class)]
    public DateTime $event_timestamp;
}
