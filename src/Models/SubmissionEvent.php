<?php

namespace DocuSealCo\DocuSeal\Models;

use Carbon\CarbonImmutable;
use DateTime;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class SubmissionEvent extends Data
{
    public int $id;

    public int $submitter_id;

    public string $event_type;
    #[WithCast(DateTimeInterfaceCast::class, type: CarbonImmutable::class, format: DATE_ATOM)]
    public DateTime $event_timestamp;
}
