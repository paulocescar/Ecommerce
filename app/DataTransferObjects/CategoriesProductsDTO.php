<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class CategoriesProductsDTO.
 */
class CategoriesProductsDTO  extends DataTransferObject
{
    public string $descricao;
    public ?string $slug;
    public ?int $idCategoriaPai;
}
