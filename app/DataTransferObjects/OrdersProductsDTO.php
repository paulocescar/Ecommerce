<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class OrdersProductsDTO.
 */
class OrdersProductsDTO extends DataTransferObject
{
    public int $pedido_id;
    public int $produto_id;
    public ?int $cupon_id;
    public float $preco;
    public int $quantidade;
}
