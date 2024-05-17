<?php

namespace DocuSealCo\DocuSeal\Models;

use Spatie\LaravelData\Data;

class User extends Data
{
    public int $id;
    public string $first_name;
    public string $last_name;
    public string $email;
}
