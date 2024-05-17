<?php

namespace DocuSealCo\DocuSeal\Models;

use DateTime;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class SubmissionEvent extends Data
{
    public int $id;

    public int $submitter_id;

    public string $event_type;
    #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d\TH:i:sP')]
    public DateTime $event_timestamp;
}
