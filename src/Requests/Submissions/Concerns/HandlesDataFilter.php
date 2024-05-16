<?php

namespace DocuSealCo\DocuSeal\Requests\Submissions\Concerns;

trait HandlesDataFilter
{
    /**
     * Remove null values from the data array
     * @param $data
     * @return array
     */
    public function handleNullData($data): array
    {
        return array_filter($data, fn ($value) => ! is_null($value));
    }
}
