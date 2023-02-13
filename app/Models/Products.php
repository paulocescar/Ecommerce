<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'produtos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codigo',
        'descricao',
        'tipo',
        'situacao',
        'slug',
        'unidade',
        'preco',
        'precoCusto',
        'descricaoCurta',
        'descricaoComplementar',
        'dataInclusao',
        'dataAlteracao',
        'imageThumbnail',
        'urlVideo',
        'nomeFornecedorc',
        'codigoFabricante',
        'marca',
        'class_fiscal',
        'cest',
        'origem',
        'idGrupoProduto',
        'linkExterno',
        'observacoes',
        'grupoProduto',
        'garantia',
        'descricaoFornecedor',
        'idFabricante',
        'pesoLiq',
        'pesoBruto',
        'estoqueMinimo',
        'estoqueMaximo',
        'gtin',
        'gtinEmbalagem',
        'larguraProduto',
        'alturaProduto',
        'profundidadeProduto',
        'unidadeMedida',
        'itensPorCaixa',
        'volumes',
        'localizacao',
        'crossdocking',
        'condicao',
        'freteGratis',
        'producao',
        'dataValidade',
        'spedTipoItem',
        'categoria_id'
    ];
    

    public function categoria(){
        return $this->belongsTo(Categories_products::class, 'categoria_id', 'id');
    }

    public function images(){
        return $this->hasMany(Products_images::class, 'produto_id', 'id');
    }
}
