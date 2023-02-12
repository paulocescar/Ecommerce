<?php

namespace Tests\Unit\Services;

use Tests\TestCase;

class ProductsTest extends TestCase
{
    
    /**
     * Testa se a rota exige autenticação.
     *
     * @return void
     */
    public function testUnauthorized()
    {
        $response = $this->get('/api/products');
        $response->assertStatus(302);
        $response = $this->post('/api/products');
        $response->assertStatus(302);
        $response = $this->get('/api/products/1');
        $response->assertStatus(302);
        $response = $this->get('/api/products/category/1');
        $response->assertStatus(302);
    }

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
                            "descricao"=>"descricao",
                            "tipo"=>"tipo",
                            "situacao"=>"situacao",
                            "unidade"=>0,
                            "preco"=>0,
                            "precoCusto"=>0.0,
                            "descricaoCurta"=>"descricaoCurta",
                            "descricaoComplementar"=>"descricaoComplementar",
                            "marca"=>"marca",
                            "estoqueMinimo"=>1.0,
                            "estoqueMaximo"=>10.0,
                            'categoria_id'=>1
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
