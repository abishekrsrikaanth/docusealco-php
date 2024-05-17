<?php

namespace DocuSealCo\DocuSeal\Models;

use DateTimeInterface;

class Template
{
    public int $id;
    public string $name;
    public ?string $external_id;
    public string $folder_name;
    public DateTimeInterface $created_at;
    public DateTimeInterface $updated_at;
}
