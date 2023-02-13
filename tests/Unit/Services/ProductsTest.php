<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use Illuminate\Support\Str;

class ProductsTest extends TestCase
{
    /**
     * Teste de get da api produto.
     *
     * @return void
     */
    public function testGet()
    {
        $response = $this->withHeader('Authorization', $this->bearer)
                        ->get('/api/products');

        $response->assertStatus(200);
    }


    /**
     * Teste de create da api produto.
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->withHeader('Authorization', $this->bearer)
                        ->post('/api/products', [
                            "codigo"=>0,
                            "descricao"=>"produto-".Str::random(8),
                            "tipo"=>"tipo-".Str::random(8),
                            "situacao"=>"situacao-".Str::random(8),
                            "unidade"=>0,
                            "preco"=>floatval(rand(1, 99).".".rand(00, 99)),
                            "precoCusto"=>floatval(rand(1, 99).".".rand(00, 99)),
                            "descricaoCurta"=>"descricaoCurta-".Str::random(8),
                            "descricaoComplementar"=>"descricaoComplementar-".Str::random(16),
                            "marca"=>"marca-".Str::random(8),
                            "estoqueMinimo"=>1.0,
                            "estoqueMaximo"=>10.0,
                            'categoria_id'=>3,
                            "images"=>[
                              [
                                "link"=>"link-".Str::random(8),
                                "validade"=>"validade-".Str::random(8),
                                "tipoArmazenamento"=>"tipoArmazenamento-".Str::random(8),
                                "produto_id"
                              ]
                            ]
                        ]);

        $response->assertStatus(200);
    }


    /**
     * Teste de create da api produto por id.
     *
     * @return void
     */
    public function testGetById()
    {
        $response = $this->withHeader('Authorization', $this->bearer)
                        ->get('/api/products/1');

        $response->assertStatus(200);
    }

    /**
     * Teste de estrutura da api produto.
     *
     * @return void
     */
    public function testGetByIdStructure()
    {
        $response = $this->withHeader('Authorization', $this->bearer)
                        ->get('/api/products/1');

        $response->assertJsonStructure([
            [
                "id",
                "codigo",
                "descricao",
                "tipo",
                "situacao",
                "unidade",
                "slug",
                "preco",
                "precoCusto",
                "descricaoCurta",
                "descricaoComplementar",
                "dataInclusao",
                "dataAlteracao",
                "imageThumbnail",
                "urlVideo",
                "nomeFornecedorc",
                "codigoFabricante",
                "marca",
                "class_fiscal",
                "cest",
                "origem",
                "idGrupoProduto",
                "linkExterno",
                "observacoes",
                "grupoProduto",
                "garantia",
                "descricaoFornecedor",
                "idFabricante",
                "pesoLiq",
                "pesoBruto",
                "estoqueMinimo",
                "estoqueMaximo",
                "gtin",
                "gtinEmbalagem",
                "larguraProduto",
                "alturaProduto",
                "profundidadeProduto",
                "unidadeMedida",
                "itensPorCaixa",
                "volumes",
                "localizacao",
                "crossdocking",
                "condicao",
                "freteGratis",
                "producao",
                "dataValidade",
                "spedTipoItem",
                "categoria_id",
                "created_at",
                "updated_at",
                "categoria" => [
                    "id",
                    "descricao",
                    "slug",
                    "idCategoriaPai",
                    "created_at",
                    "updated_at"
                ],
                "images"=>[
                  [
                    "link",
                    "validade",
                    "tipoArmazenamento",
                    "produto_id"
                  ]
                ]
            ]
        ]);

        $response->assertStatus(200);
    }


    /**
     * Teste de create da api produto por categoria.
     *
     * @return void
     */
    public function testGetByCategoria()
    {
        $response = $this->withHeader('Authorization', $this->bearer)
                        ->get('/api/products/category/1');

        $response->assertStatus(200);
    }
}
