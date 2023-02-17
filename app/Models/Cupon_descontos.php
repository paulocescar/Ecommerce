<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon_descontos extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'produto_id',
        'cupon_id',
        'preco',
        'quantidade'
    ];

    protected $hidden = [
        'id'
    ];

}
