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
        return $this->belongsTo(Categories_products::class, 'idCategoriaPai', 'id');
    }
}
