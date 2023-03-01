<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedidos_produtos extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'pedido_id',
        'produto_id',
        'cupon_id',
        'preco',
        'quantidade'
    ];

    protected $hidden = [
        'id'
    ];

    public function produtos(){
        return $this->hasMany(Products::class,'id','produto_id');
    }

}
