<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class BlingDTO.
 */
class BlingDTO extends DataTransferObject
{
    public ?string $name;
    public ?string $email;
    public string $api_key;
    public ?int $user_id;
}
