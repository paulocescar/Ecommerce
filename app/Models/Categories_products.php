<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories_products extends Model
{
    use HasFactory;
    protected $table = 'produtos_categorias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'descricao',
        'slug',
        'idCategoriaPai',
    ];

    public function categoriaPai(){
        return $this->hasOne(Categories_products::class, 'idCategoriaPai', 'id');
    }

    public function scopeSemPai($query){
        return $query->whereNull('idCategoriaPai');
    }

    public function getFormattedCreatedAttribute()
    {
        return \Carbon\Carbon::parse($this->created_at)->format("d/m/Y");
    }
}
