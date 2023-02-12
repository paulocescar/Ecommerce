<?php

namespace Tests\Unit\Services;

use Tests\TestCase;

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
