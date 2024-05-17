<?php

namespace DocuSealCo\DocuSeal\Models;

use Spatie\LaravelData\Data;

class Document extends Data
{
    public string $name;

    public string $url;
}
