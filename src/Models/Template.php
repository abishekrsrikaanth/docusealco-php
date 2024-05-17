<?php

namespace DocuSealCo\DocuSeal\Models;

use DateTime;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class Template extends Data
{
    public int $id;
    public string $name;
    public ?string $external_id;
    public string $folder_name;
    #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d\TH:i:sP')]
    public DateTime $created_at;
    #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d\TH:i:sP')]
    public DateTime $updated_at;
}
