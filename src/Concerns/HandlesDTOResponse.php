<?php

namespace DocuSealCo\DocuSeal\Concerns;

trait HandlesDTOResponse
{
    public function toDTOArray($data, $dtoClass): array
    {
        return $dtoClass::collect($data);
    }

    public function toDTO($data, $dtoClass)
    {
        return $dtoClass::from($data);
    }
}
