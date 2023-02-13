<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class ImagemDTO extends DataTransferObject{
    public ?string $link;
    public ?string $validade;
    public ?string $tipoArmazenamento;
 }
