<?php

namespace DocuSealCo\DocuSeal\Requests\Submissions\Concerns;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;

trait HandlesDTOResponse
{
    /**
     * @param $data
     * @param $dtoClass
     * @return array
     * @throws MappingError
     */
    public function toDTOArray($data, $dtoClass): array
    {
        return (new MapperBuilder())
            ->mapper()
            ->map(
                'array<'.$dtoClass.'>',
                Source::array($data)
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
