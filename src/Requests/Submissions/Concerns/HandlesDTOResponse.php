<?php

namespace DocuSealCo\DocuSeal\Requests\Submissions\Concerns;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\MapperBuilder;

trait HandlesDTOResponse
{
    /**
     * @param $data
     * @param $dtoClass
     * @return mixed|object
     * @throws MappingError
     */
    public function toDTOArray($data, $dtoClass)
    {
        return (new MapperBuilder())->mapper()
            ->map(
                'array<'.$dtoClass.'>',
                $data
            );
    }

    /**
     * @throws MappingError
     */
    public function toDTO($data, $dtoClass)
    {
        return (new MapperBuilder())->mapper()
            ->map(
                $dtoClass,
                $data
            );
    }
}
