<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedidos extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'user_id',
        'address_id',
        'payment_type'
    ];

    protected $hidden = [
        'id'
    ];


    public function pedidosProdutos(){
        return $this->belongsTo(Pedidos_produtos::class,'pedido_id','id');
    }
}
