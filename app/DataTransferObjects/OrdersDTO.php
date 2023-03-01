<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class OrdersDTO.
 */
class OrdersDTO extends DataTransferObject
{
    public int $user_id;
    public int $address_id;
    public int $payment_type;
}
