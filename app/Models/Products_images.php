<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products_images extends Model
{
    use HasFactory;
    protected $table = 'produtos_images';

    protected $fillable = [
        'link',
        'validade',
        'tipoArmazenamento',
        'produto_id'
    ];

    protected $hidden = [
        'id'
    ];
}
