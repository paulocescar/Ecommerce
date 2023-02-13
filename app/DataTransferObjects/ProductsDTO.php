<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;
use App\DataTransferObjects\ImagemDTO;
/**
 * Class ProductsDTO.
 */
class ProductsDTO extends DataTransferObject
{
    public string $descricao;
    public ?int $codigo;
    public ?string $tipo;
    public ?string $situacao;
    public ?string $slug;
    public int  $unidade;
    public float  $preco;
    public ?float  $precoCusto;
    public ?string $descricaoCurta;
    public ?string $descricaoComplementar;
    public ?string $dataInclusao;
    public ?string $dataAlteracao;
    public ?string $imageThumbnail;
    public ?string $urlVideo;
    public ?string $nomeFornecedorc;
    public ?string $codigoFabricante;
    public ?string $marca;
    public ?string $class_fiscal;
    public ?float  $cest;
    public ?string $origem;
    public ?string $idGrupoProduto;
    public ?string $linkExterno;
    public ?string $observacoes;
    public ?string $grupoProduto;
    public ?string $garantia;
    public ?string $descricaoFornecedor;
    public ?string $idFaabricante;
    public ?float  $pesoLiq;
    public ?float  $pesoBruto;
    public ?float  $estoqueMinimo;
    public ?float  $estoqueMaximo;
    public ?string $gtin;
    public ?string $gtinEmbalagem;
    public ?string $larguraProduto;
    public ?string $alturaProduto;
    public ?string $profundidadeProduto;
    public ?string $unidadeMedida;
    public ?int    $itensPorCaixa;
    public ?int    $volumes;
    public ?string $localizacao;
    public ?string $crossdocking;
    public ?string $condicao;
    public ?string $freteGratis;
    public ?string $producao;
    public ?string $dataValidade;
    public ?string $spedTipoItem;
    public ?int    $categoria_id;
    public ?array $images;
}