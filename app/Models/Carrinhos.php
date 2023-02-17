<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrinhos extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'carrinhos';

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

    public function produtos(){
        return $this->hasMany(Products::class,'id','produto_id');
    }

    public function usuario(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function cupon(){
        return $this->hasOne(Cupon_descontos::class, 'id', 'cupon_id');
    }

}
