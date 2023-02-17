<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class CartsDTO.
 */
class CartsDTO extends DataTransferObject
{
    public int $user_id;
    public int $produto_id;
    public ?int $cupon_id;
    public float $preco;
    public int $quantidade;
}
