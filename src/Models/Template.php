<?php

namespace DocuSealCo\DocuSeal\Models;

use Carbon\CarbonImmutable;
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
    #[WithCast(DateTimeInterfaceCast::class, type: CarbonImmutable::class)]
    public DateTime $created_at;
    #[WithCast(DateTimeInterfaceCast::class, type: CarbonImmutable::class)]
    public DateTime $updated_at;
}
