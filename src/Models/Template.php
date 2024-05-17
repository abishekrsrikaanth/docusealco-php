<?php

namespace DocuSealCo\DocuSeal\Models;

use DateTime;
use DocuSealCo\DocuSeal\Casts\DateTime as DateTimeCast;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class Template extends Data
{
    public int $id;

    public string $name;

    public ?string $external_id;

    public string $folder_name;

    #[WithCast(DateTimeCast::class)]
    public DateTime $created_at;

    #[WithCast(DateTimeCast::class)]
    public DateTime $updated_at;
}
